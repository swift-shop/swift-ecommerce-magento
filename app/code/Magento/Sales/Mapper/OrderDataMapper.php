<?php

namespace Magento\Sales\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Sales\Model\Data\OrderData;
use Swift\Sales\Model\Data\OrderDataFactory;
use Magento\Sales\Model\OrderModel;

 /**
 * Converts a collection of Order entities to an array of data transfer objects.
 */
class OrderDataMapper
{
    /**
     * @var OrderDataFactory
     */
    private OrderDataFactory $entityDtoFactory;

    /**
     * @param OrderDataFactory $entityDtoFactory
     */
    public function __construct(
        OrderDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|OrderData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var OrderModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var OrderData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
