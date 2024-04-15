<?php

namespace Swift\Catalog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Swift\Catalog\Model\Data\CategoryData;

class CategoryResource extends AbstractDb {
    /**
     * @var string
     */
    protected $_eventPrefix = 'category_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('category', CategoryData::CATEGORY_ID);
        $this->_useIsObjectNew = true;
    }
}
