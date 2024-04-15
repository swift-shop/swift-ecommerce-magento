<?php

namespace Swift\Marketing\Model\ResourceModel\CommunicationModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Marketing\Model\CommunicationModel;
use Swift\Marketing\Model\ResourceModel\CommunicationResource;

class CommunicationCollection extends AbstractCollection {
    /**
     * @var string
     */
    protected $_eventPrefix = 'communication_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(CommunicationModel::class, CommunicationResource::class);
    }
}
