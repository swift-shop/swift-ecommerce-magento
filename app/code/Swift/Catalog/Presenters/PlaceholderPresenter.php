<?php

namespace Swift\Catalog\Presenters;

use Swift\Catalog\Services\ProductService;

class ProductPresenter
{
    public function __construct(
        private ProductService $service
    ) {

    }

}
