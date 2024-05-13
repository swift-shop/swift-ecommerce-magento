<?php

namespace Magento\Sales\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Sales\Model\ResourceModel\OrderResource;

class OrderModel extends AbstractModel {
    /**
     * @var string
     */
    protected $_eventPrefix = 'order_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(OrderResource::class);
    }
}
