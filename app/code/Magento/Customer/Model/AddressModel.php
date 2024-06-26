<?php

namespace Magento\Customer\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Customer\Model\ResourceModel\AddressResource;

class AddressModel extends AbstractModel {
    /**
     * @var string
     */
    protected $_eventPrefix = 'address_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(AddressResource::class);
    }
}
