<?php

namespace Magento\Catalog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Catalog\Model\Data\StockData;

class StockResource extends AbstractDb {
    /**
     * @var string
     */
    protected $_eventPrefix = 'stock_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('stock', StockData::STOCK_ID);
        $this->_useIsObjectNew = true;
    }
}
