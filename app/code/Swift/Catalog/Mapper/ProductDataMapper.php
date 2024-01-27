<?php

namespace Swift\Catalog\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Catalog\Api\Data\ProductInterface;
use Swift\Catalog\Api\Data\ProductInterfaceFactory;
use Swift\Catalog\Model\ProductModel;

/**
 * Converts a collection of Product entities to an array of data transfer objects.
 */
class ProductDataMapper
{
    /**
     * @var ProductInterfaceFactory
     */
    private ProductInterfaceFactory $entityDtoFactory;

    /**
     * @param ProductInterfaceFactory $entityDtoFactory
     */
    public function __construct(
        ProductInterfaceFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|ProductInterface[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var ProductModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var ProductInterface|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
