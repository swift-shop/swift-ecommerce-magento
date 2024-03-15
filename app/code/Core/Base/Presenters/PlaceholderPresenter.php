<?php

namespace Core\Base\Presenters;

use Core\Base\Services\Service;

class Presenter
{
    public function __construct(
        private Service $service
    ) {
    }

}
