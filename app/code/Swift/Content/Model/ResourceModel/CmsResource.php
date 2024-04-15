<?php

namespace Swift\Content\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Swift\Content\Model\Data\CmsData;

class CmsResource extends AbstractDb {
    /**
     * @var string
     */
    protected $_eventPrefix = 'cms_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('cms', CmsData::CMS_ID);
        $this->_useIsObjectNew = true;
    }
}
