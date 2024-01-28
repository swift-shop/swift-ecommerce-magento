<?php

namespace Tool\Template\Presenters;

use Tool\Template\Services\PlaceholderService;

class PlaceholderPresenter
{
    public function __construct(
        private PlaceholderService $service
    )
    {

    }

}