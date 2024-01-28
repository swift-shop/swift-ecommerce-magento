<?php

namespace Core\Middleware\Library;

use Redis;

/**
 *
 */
final class CacheLibrary
{
    private string $cacheVersion = '1';
    private Redis $redis;

    private $cacheUrls = [
        '/mp/product/detail',
    ];

    /**
     * @var bool|null
     */
    protected ?bool $isAllowMethod = null;

    /**
     * @var array
     */
    protected array $allowRequestTypes = ['GET', 'POST'];

    public const CACHE_PREFIX = 'swift-cache:';


    public static function create(): CacheLibrary
    {
        return new self();
    }


    /**
     * @return false|mixed|string|null
     * @throws \JsonException
     * @throws \RedisException
     */
    public function loadCache()
    {
        if ($this->cacheAble()) {
            $cacheData = $this->getParam('refresh') ? false : $this->redisConn()->get($this->getCacheKey());
            return $this->decodeData($cacheData);
        }
        return null;
    }

    public function getCacheKey()
    {
        $params = $this->getParams();
        if (!empty($params['refresh'])) {
            unset($params['refresh']);
        }
        return $this->encryptionKey($this->getOriginRequestUri(), $params);
    }

    /**
     * @return mixed
     * @throws \JsonException
     */
    private function getParams(): mixed
    {
        $params = file_get_contents("php://input");
        return json_decode($params, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @param $key
     * @return mixed
     * @throws \JsonException
     */
    private function getParam($key = null): mixed
    {
        $params = $this->getParams();
        return $key ? $params[$key] ?? false : false;
    }

    public function encryptionKey($requireUrl, $params)
    {
        $cacheVersion = $params['cacheVersion'] ?? $this->cacheVersion;
        return self::CACHE_PREFIX . md5($requireUrl . $cacheVersion . json_encode($params));
    }

    public function cacheAble($uri = ''): bool
    {
        $uri = $this->getRequestUri($uri);
        if (in_array($uri, $this->cacheUrls)) {
            return true;
        }
        if (strpos($uri, '/rest/V2/custom/config/') === 0) {
            return true;
        }
        return false;
    }

    public function getRequestUri(mixed $uri = null): string
    {
        if (empty($uri)) {
            $uri = $this->getOriginRequestUri();
        }
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        if (str_ends_with($uri, '/')) {
            $uri = substr($uri, 0, -1);
        }
        $uri = substr($uri, strpos($uri, '/mp'));
        return $uri;
    }

    private function getOriginRequestUri($getParams = [])
    {
        if (isset($getParams['refresh'])) {
            return null;
        }
        $uri = (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
        if (empty($uri)) {
            return null;
        }
        if (!$this->checkIsAllowMethod($uri)) {
            return null;
        }
        return $uri;
    }

    public function checkIsAllowMethod($uri = null)
    {
        if ($this->isAllowMethod === null) {
            if (isset($_SERVER['REQUEST_METHOD'])
                && (in_array($_SERVER['REQUEST_METHOD'], $this->allowRequestTypes, true))) {
                $this->isAllowMethod = true;
            } else {
                $this->isAllowMethod = false;
            }
            if (!$this->isAllowMethod
                && (stripos($uri, 'cartcount') || stripos($uri, 'productBrowsing'))) {
                $this->isAllowMethod = true;
            }
        }
        return $this->isAllowMethod;
    }

    protected function decodeData($data)
    {
        switch (substr($data, 0, 4)) {
            case ':gz:':
                $data = gzuncompress(substr($data, 4));
                break;
            case ':sn:':
                $data = snappy_uncompress(substr($data, 4));
                break;
            case ':lz:':
                $data = lzf_decompress(substr($data, 4));
                break;
            case ':l4:':
                $data = lz4_uncompress(substr($data, 4));
                break;
            default:
                break;
        }
        return $data;
    }

    /**
     * @return Redis
     * @throws \RedisException
     */
    private function redisConn(): Redis
    {
        if (empty($this->redis)) {
            $redis = new Redis();
            $tempConfig = $this->getRedisCacheConfig();
            $host = $tempConfig['host'];
            $port = $tempConfig['port'];
            $pass = $tempConfig['pass'];
            $redis->connect($host, $port);
            if (isset($pass) && $pass) {
                $redis->auth($pass);
            }
            $redis->select(6);
            $this->redis = $redis;
        }
        return $this->redis;
    }

    private function getRedisCacheConfig(): array
    {
        $envData = require __DIR__ . '/../../../../../app/etc/env.php';
        $backendOptions = $envData['cache']['frontend']['default']['backend_options'];
        return [
            'host' => $backendOptions['server'],
            'port' => $backendOptions['port'],
            'pass' => $backendOptions['password'],
        ];
    }

}
