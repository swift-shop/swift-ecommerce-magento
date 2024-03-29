<?php
/**
 * User: BenHuang
 * Email: benhuang1024@gmail.com
 * Date: 2022/4/2
 * Time: 15:00
 */

declare(strict_types=1);

namespace Core\Base\Services;

use Core\Base\Transformers\ResponseTransformer;

class Service
{
    public function __construct(
        private readonly ResponseTransformer $responseTransformer
    ) {

    }
}
