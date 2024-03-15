<?php

namespace Catalog\Product\Model\ResourceModel;

use Catalog\Product\Model\Data\ProductData;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductResource extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'product_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('product', ProductData::PRODUCT_ID);
        $this->_useIsObjectNew = true;
    }
}
