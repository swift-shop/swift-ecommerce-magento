<?php

namespace Swift\Catalog\Model;

use Magento\Framework\Model\AbstractModel;
use Swift\Catalog\Model\ResourceModel\ProductResource;

class ProductModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'product_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ProductResource::class);
    }
}
