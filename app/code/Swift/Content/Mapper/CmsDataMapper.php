<?php

namespace Swift\Content\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Content\Model\CmsModel;
use Swift\Content\Model\Data\CmsData;
use Swift\Content\Model\Data\CmsDataFactory;

 /**
 * Converts a collection of Cms entities to an array of data transfer objects.
 */
class CmsDataMapper
{
    /**
     * @var CmsDataFactory
     */
    private CmsDataFactory $entityDtoFactory;

    /**
     * @param CmsDataFactory $entityDtoFactory
     */
    public function __construct(
        CmsDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|CmsData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var CmsModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var CmsData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
