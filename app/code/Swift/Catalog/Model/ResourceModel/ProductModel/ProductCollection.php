<?php

namespace Swift\Catalog\Model\ResourceModel\ProductModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Catalog\Model\ProductModel;
use Swift\Catalog\Model\ResourceModel\ProductResource;

class ProductCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'product_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(ProductModel::class, ProductResource::class);
    }
}
