<?php

namespace Catalog\Product\Mapper;

use Catalog\Product\Model\Data\ProductData;
use Catalog\Product\Model\Data\ProductDataFactory;
use Catalog\Product\Model\ProductModel;
use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

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
