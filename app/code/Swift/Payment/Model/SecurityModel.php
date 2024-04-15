<?php

namespace Swift\Payment\Model;

use Magento\Framework\Model\AbstractModel;
use Swift\Payment\Model\ResourceModel\SecurityResource;

class SecurityModel extends AbstractModel {
    /**
     * @var string
     */
    protected $_eventPrefix = 'security_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(SecurityResource::class);
    }
}
