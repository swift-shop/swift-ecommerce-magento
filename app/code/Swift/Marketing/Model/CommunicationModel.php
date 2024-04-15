<?php

namespace Swift\Marketing\Model;

use Magento\Framework\Model\AbstractModel;
use Swift\Marketing\Model\ResourceModel\CommunicationResource;

class CommunicationModel extends AbstractModel {
    /**
     * @var string
     */
    protected $_eventPrefix = 'communication_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(CommunicationResource::class);
    }
}
