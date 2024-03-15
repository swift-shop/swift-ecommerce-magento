<?php

namespace Catalog\Product\Model;

use Catalog\Product\Model\ResourceModel\ProductResource;
use Magento\Framework\Model\AbstractModel;

class ProductModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'product_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ProductResource::class);
    }
}
