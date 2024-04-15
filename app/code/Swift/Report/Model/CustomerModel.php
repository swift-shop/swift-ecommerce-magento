<?php

namespace Swift\Report\Model;

use Magento\Framework\Model\AbstractModel;
use Swift\Report\Model\ResourceModel\CustomerResource;

class CustomerModel extends AbstractModel {
    /**
     * @var string
     */
    protected $_eventPrefix = 'customer_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(CustomerResource::class);
    }
}
