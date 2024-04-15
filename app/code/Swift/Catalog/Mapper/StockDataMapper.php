<?php

namespace Swift\Catalog\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Catalog\Model\Data\StockData;
use Swift\Catalog\Model\Data\StockDataFactory;
use Swift\Catalog\Model\StockModel;

 /**
 * Converts a collection of Stock entities to an array of data transfer objects.
 */
class StockDataMapper
{
    /**
     * @var StockDataFactory
     */
    private StockDataFactory $entityDtoFactory;

    /**
     * @param StockDataFactory $entityDtoFactory
     */
    public function __construct(
        StockDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|StockData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var StockModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var StockData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
