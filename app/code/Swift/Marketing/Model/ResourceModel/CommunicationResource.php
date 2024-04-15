<?php

namespace Swift\Marketing\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Swift\Marketing\Model\Data\CommunicationData;

class CommunicationResource extends AbstractDb {
    /**
     * @var string
     */
    protected $_eventPrefix = 'communication_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('communication', CommunicationData::COMMUNICATION_ID);
        $this->_useIsObjectNew = true;
    }
}
