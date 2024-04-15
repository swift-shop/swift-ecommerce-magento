<?php

namespace Swift\Customer\Model\ResourceModel\AddressModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Customer\Model\AddressModel;
use Swift\Customer\Model\ResourceModel\AddressResource;

class AddressCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'address_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(AddressModel::class, AddressResource::class);
    }
}
