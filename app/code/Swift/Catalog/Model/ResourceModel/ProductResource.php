<?php

namespace Swift\Catalog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Swift\Catalog\Api\Data\ProductInterface;

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
        $this->_init('product', ProductInterface::PRODUCT_ID);
        $this->_useIsObjectNew = true;
    }
}
