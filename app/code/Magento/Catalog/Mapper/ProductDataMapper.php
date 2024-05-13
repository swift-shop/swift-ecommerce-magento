<?php

namespace Magento\Catalog\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Catalog\Model\Data\ProductData;
use Swift\Catalog\Model\Data\ProductDataFactory;
use Magento\Catalog\Model\ProductModel;

/**
 * Converts a collection of Product entities to an array of data transfer objects.
 */
class ProductDataMapper
{
    /**
     * @var ProductDataFactory
     */
    private ProductDataFactory $entityDtoFactory;

    /**
     * @param ProductDataFactory $entityDtoFactory
     */
    public function __construct(
        ProductDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|ProductData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var ProductModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var ProductData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
