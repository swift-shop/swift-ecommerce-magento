<?php

namespace Swift\Marketing\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Swift\Marketing\Model\Data\PromotionData;

class PromotionResource extends AbstractDb {
    /**
     * @var string
     */
    protected $_eventPrefix = 'promotion_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('promotion', PromotionData::PROMOTION_ID);
        $this->_useIsObjectNew = true;
    }
}
