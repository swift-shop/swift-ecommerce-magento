<?php

namespace Swift\Report\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Report\Model\CustomerModel;
use Swift\Report\Model\Data\CustomerData;
use Swift\Report\Model\Data\CustomerDataFactory;

 /**
 * Converts a collection of Customer entities to an array of data transfer objects.
 */
class CustomerDataMapper
{
    /**
     * @var CustomerDataFactory
     */
    private CustomerDataFactory $entityDtoFactory;

    /**
     * @param CustomerDataFactory $entityDtoFactory
     */
    public function __construct(
        CustomerDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|CustomerData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var CustomerModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var CustomerData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
