<?php

namespace Swift\Catalog\Model\ResourceModel\CategoryModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Catalog\Model\CategoryModel;
use Swift\Catalog\Model\ResourceModel\CategoryResource;

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
