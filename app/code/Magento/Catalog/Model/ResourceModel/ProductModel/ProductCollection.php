<?php

namespace Magento\Catalog\Model\ResourceModel\ProductModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Catalog\Model\ProductModel;
use Magento\Catalog\Model\ResourceModel\ProductResource;

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
