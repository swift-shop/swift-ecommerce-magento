<?php

namespace Swift\Marketing\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Marketing\Model\CommunicationModel;
use Swift\Marketing\Model\Data\CommunicationData;
use Swift\Marketing\Model\Data\CommunicationDataFactory;

 /**
 * Converts a collection of Communication entities to an array of data transfer objects.
 */
class CommunicationDataMapper
{
    /**
     * @var CommunicationDataFactory
     */
    private CommunicationDataFactory $entityDtoFactory;

    /**
     * @param CommunicationDataFactory $entityDtoFactory
     */
    public function __construct(
        CommunicationDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|CommunicationData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var CommunicationModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var CommunicationData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
