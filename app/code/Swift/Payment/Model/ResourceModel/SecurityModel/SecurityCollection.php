<?php

namespace Swift\Payment\Model\ResourceModel\SecurityModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Payment\Model\ResourceModel\SecurityResource;
use Swift\Payment\Model\SecurityModel;

class SecurityCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'security_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(SecurityModel::class, SecurityResource::class);
    }
}
