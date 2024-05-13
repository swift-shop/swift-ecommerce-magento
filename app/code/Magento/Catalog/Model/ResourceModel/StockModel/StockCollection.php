<?php

namespace Magento\Catalog\Model\ResourceModel\StockModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Catalog\Model\ResourceModel\StockResource;
use Magento\Catalog\Model\StockModel;

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
