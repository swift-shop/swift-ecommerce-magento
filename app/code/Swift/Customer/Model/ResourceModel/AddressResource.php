<?php

namespace Swift\Customer\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Swift\Customer\Model\Data\AddressData;

class AddressResource extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'address_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('address', AddressData::ADDRESS_ID);
        $this->_useIsObjectNew = true;
    }
}
