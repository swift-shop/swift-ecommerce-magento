<?php

namespace Swift\Marketing\Query\Promotion;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Swift\Marketing\Api\Data\PromotionSearchResultsInterface;
use Swift\Marketing\Api\Data\PromotionSearchResultsInterfaceFactory;
use Swift\Marketing\Api\GetPromotionListInterface;
use Swift\Marketing\Mapper\PromotionDataMapper;
use Swift\Marketing\Model\ResourceModel\PromotionModel\PromotionCollection;
use Swift\Marketing\Model\ResourceModel\PromotionModel\PromotionCollectionFactory;

/**
 * Get Promotion list by search criteria query.
 */
class GetListQuery implements GetPromotionListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var PromotionCollectionFactory
     */
    private PromotionCollectionFactory $entityCollectionFactory;

    /**
     * @var PromotionDataMapper
     */
    private PromotionDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var PromotionSearchResultsInterfaceFactory
     */
    private PromotionSearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param PromotionCollectionFactory $entityCollectionFactory
     * @param PromotionDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param PromotionSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        PromotionCollectionFactory $entityCollectionFactory,
        PromotionDataMapper $entityDataMapper,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        PromotionSearchResultsInterfaceFactory $searchResultFactory
    ) {
        $this->collectionProcessor = $collectionProcessor;
        $this->entityCollectionFactory = $entityCollectionFactory;
        $this->entityDataMapper = $entityDataMapper;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->searchResultFactory = $searchResultFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): PromotionSearchResultsInterface
    {
        /** @var PromotionCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var PromotionSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
