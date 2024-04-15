<?php

namespace Swift\Marketing\Model;

use Magento\Framework\Model\AbstractModel;
use Swift\Marketing\Model\ResourceModel\PromotionResource;

class PromotionModel extends AbstractModel {
    /**
     * @var string
     */
    protected $_eventPrefix = 'promotion_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(PromotionResource::class);
    }
}
