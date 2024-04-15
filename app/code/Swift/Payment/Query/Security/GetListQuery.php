<?php

namespace Swift\Payment\Query\Security;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Swift\Payment\Api\Data\SecuritySearchResultsInterface;
use Swift\Payment\Api\Data\SecuritySearchResultsInterfaceFactory;
use Swift\Payment\Api\GetSecurityListInterface;
use Swift\Payment\Mapper\SecurityDataMapper;
use Swift\Payment\Model\ResourceModel\SecurityModel\SecurityCollection;
use Swift\Payment\Model\ResourceModel\SecurityModel\SecurityCollectionFactory;

/**
 * Get Security list by search criteria query.
 */
class GetListQuery implements GetSecurityListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var SecurityCollectionFactory
     */
    private SecurityCollectionFactory $entityCollectionFactory;

    /**
     * @var SecurityDataMapper
     */
    private SecurityDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var SecuritySearchResultsInterfaceFactory
     */
    private SecuritySearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param SecurityCollectionFactory $entityCollectionFactory
     * @param SecurityDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SecuritySearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        SecurityCollectionFactory $entityCollectionFactory,
        SecurityDataMapper $entityDataMapper,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SecuritySearchResultsInterfaceFactory $searchResultFactory
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
    public function execute(?SearchCriteriaInterface $searchCriteria = null): SecuritySearchResultsInterface
    {
        /** @var SecurityCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var SecuritySearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
