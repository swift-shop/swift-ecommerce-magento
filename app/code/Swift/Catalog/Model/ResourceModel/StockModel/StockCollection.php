<?php

namespace Swift\Catalog\Model\ResourceModel\StockModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Catalog\Model\ResourceModel\StockResource;
use Swift\Catalog\Model\StockModel;

class StockCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'stock_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(StockModel::class, StockResource::class);
    }
}
