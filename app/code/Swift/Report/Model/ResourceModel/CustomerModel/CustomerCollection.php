<?php

namespace Swift\Report\Model\ResourceModel\CustomerModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Report\Model\CustomerModel;
use Swift\Report\Model\ResourceModel\CustomerResource;

class CustomerCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'customer_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(CustomerModel::class, CustomerResource::class);
    }
}
