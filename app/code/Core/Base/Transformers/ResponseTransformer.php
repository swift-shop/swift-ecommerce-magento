<?php

namespace Core\Base\Transformers;

/**
 *
 */
abstract class ResponseTransformer extends Transformer
{
    /**
     * @var array
     */
    private array $body = [
        'code' => 40001,
        'message' => 'error',
        'data' => null,
    ];

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @param $body
     * @return $this
     */
    public function setBody($body): static
    {
        $this->body = $body;
        return $this;
    }
}
