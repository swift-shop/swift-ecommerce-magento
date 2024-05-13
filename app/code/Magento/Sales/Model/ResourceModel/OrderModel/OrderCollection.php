<?php

namespace Magento\Sales\Model\ResourceModel\OrderModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Sales\Model\OrderModel;
use Magento\Sales\Model\ResourceModel\OrderResource;

class OrderCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'order_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(OrderModel::class, OrderResource::class);
    }
}
