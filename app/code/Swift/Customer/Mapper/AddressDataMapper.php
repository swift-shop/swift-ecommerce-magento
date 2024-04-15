<?php

namespace Swift\Customer\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Customer\Model\AddressModel;
use Swift\Customer\Model\Data\AddressData;
use Swift\Customer\Model\Data\AddressDataFactory;

 /**
 * Converts a collection of Address entities to an array of data transfer objects.
 */
class AddressDataMapper
{
    /**
     * @var AddressDataFactory
     */
    private AddressDataFactory $entityDtoFactory;

    /**
     * @param AddressDataFactory $entityDtoFactory
     */
    public function __construct(
        AddressDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|AddressData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var AddressModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var AddressData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
