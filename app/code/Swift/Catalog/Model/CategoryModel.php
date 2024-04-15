<?php

namespace Swift\Catalog\Model;

use Magento\Framework\Model\AbstractModel;
use Swift\Catalog\Model\ResourceModel\CategoryResource;

class CategoryModel extends AbstractModel {
    /**
     * @var string
     */
    protected $_eventPrefix = 'category_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(CategoryResource::class);
    }
}
