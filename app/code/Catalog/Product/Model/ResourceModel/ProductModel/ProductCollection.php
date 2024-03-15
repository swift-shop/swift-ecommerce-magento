<?php

namespace Catalog\Product\Model\ResourceModel\ProductModel;

use Catalog\Product\Model\ProductModel;
use Catalog\Product\Model\ResourceModel\ProductResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class ProductCollection extends AbstractCollection
{
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
