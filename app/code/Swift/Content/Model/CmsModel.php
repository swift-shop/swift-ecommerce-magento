<?php

namespace Swift\Content\Model;

use Magento\Framework\Model\AbstractModel;
use Swift\Content\Model\ResourceModel\CmsResource;

class CmsModel extends AbstractModel {
    /**
     * @var string
     */
    protected $_eventPrefix = 'cms_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(CmsResource::class);
    }
}
