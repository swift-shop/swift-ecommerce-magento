<?php

namespace Swift\Payment\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Payment\Model\Data\SecurityData;
use Swift\Payment\Model\Data\SecurityDataFactory;
use Swift\Payment\Model\SecurityModel;

 /**
 * Converts a collection of Security entities to an array of data transfer objects.
 */
class SecurityDataMapper
{
    /**
     * @var SecurityDataFactory
     */
    private SecurityDataFactory $entityDtoFactory;

    /**
     * @param SecurityDataFactory $entityDtoFactory
     */
    public function __construct(
        SecurityDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|SecurityData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var SecurityModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var SecurityData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
