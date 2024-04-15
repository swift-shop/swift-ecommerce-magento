<?php

namespace Swift\Sales\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Swift\Sales\Model\Data\OrderData;

class OrderResource extends AbstractDb {
    /**
     * @var string
     */
    protected $_eventPrefix = 'order_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('order', OrderData::ORDER_ID);
        $this->_useIsObjectNew = true;
    }
}
