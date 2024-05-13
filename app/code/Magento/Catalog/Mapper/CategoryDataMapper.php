<?php

namespace Magento\Catalog\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Catalog\Model\CategoryModel;
use Magento\Catalog\Model\Data\CategoryData;
use Swift\Catalog\Model\Data\CategoryDataFactory;

/**
 * Converts a collection of Category entities to an array of data transfer objects.
 */
class CategoryDataMapper
{
    /**
     * @var CategoryDataFactory
     */
    private CategoryDataFactory $entityDtoFactory;

    /**
     * @param CategoryDataFactory $entityDtoFactory
     */
    public function __construct(
        CategoryDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|CategoryData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var CategoryModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var CategoryData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
