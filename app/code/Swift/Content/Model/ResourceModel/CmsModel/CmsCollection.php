<?php

namespace Swift\Content\Model\ResourceModel\CmsModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Content\Model\CmsModel;
use Swift\Content\Model\ResourceModel\CmsResource;

class CmsCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'cms_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(CmsModel::class, CmsResource::class);
    }
}
