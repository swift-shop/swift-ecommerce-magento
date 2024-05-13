<?php

namespace Magento\Catalog\Model\ResourceModel\CategoryModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Catalog\Model\CategoryModel;
use Magento\Catalog\Model\ResourceModel\CategoryResource;

class CategoryCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'category_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(CategoryModel::class, CategoryResource::class);
    }
}
