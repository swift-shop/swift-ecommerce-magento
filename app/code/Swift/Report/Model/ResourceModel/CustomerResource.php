<?php

namespace Swift\Report\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Swift\Report\Model\Data\CustomerData;

class CustomerResource extends AbstractDb {
    /**
     * @var string
     */
    protected $_eventPrefix = 'customer_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('customer', CustomerData::CUSTOMER_ID);
        $this->_useIsObjectNew = true;
    }
}
