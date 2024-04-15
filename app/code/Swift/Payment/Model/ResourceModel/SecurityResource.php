<?php

namespace Swift\Payment\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Swift\Payment\Model\Data\SecurityData;

class SecurityResource extends AbstractDb {
    /**
     * @var string
     */
    protected $_eventPrefix = 'security_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('security', SecurityData::SECURITY_ID);
        $this->_useIsObjectNew = true;
    }
}
