<?php

namespace Core\Base\Presenters;

use Core\Base\Services\Service;

class PlaceholderPresenter
{
    public function __construct(
        private Service $service
    )
    {

    }

}