<?php

namespace Swift\Marketing\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Swift\Marketing\Model\Data\PromotionData;
use Swift\Marketing\Model\Data\PromotionDataFactory;
use Swift\Marketing\Model\PromotionModel;

 /**
 * Converts a collection of Promotion entities to an array of data transfer objects.
 */
class PromotionDataMapper
{
    /**
     * @var PromotionDataFactory
     */
    private PromotionDataFactory $entityDtoFactory;

    /**
     * @param PromotionDataFactory $entityDtoFactory
     */
    public function __construct(
        PromotionDataFactory $entityDtoFactory
    ) {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|PromotionData[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var PromotionModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var PromotionData|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
