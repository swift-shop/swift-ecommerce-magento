<?php

namespace Swift\Marketing\Model\ResourceModel\PromotionModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Marketing\Model\PromotionModel;
use Swift\Marketing\Model\ResourceModel\PromotionResource;

class PromotionCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'promotion_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(PromotionModel::class, PromotionResource::class);
    }
}
