<?php

namespace Magento\Catalog\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Catalog\Model\ResourceModel\StockResource;

class StockModel extends AbstractModel {
    /**
     * @var string
     */
    protected $_eventPrefix = 'stock_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(StockResource::class);
    }
}
