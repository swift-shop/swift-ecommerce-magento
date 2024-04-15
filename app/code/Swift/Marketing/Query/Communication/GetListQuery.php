<?php

namespace Swift\Marketing\Query\Communication;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Swift\Marketing\Api\Data\CommunicationSearchResultsInterface;
use Swift\Marketing\Api\Data\CommunicationSearchResultsInterfaceFactory;
use Swift\Marketing\Api\GetCommunicationListInterface;
use Swift\Marketing\Mapper\CommunicationDataMapper;
use Swift\Marketing\Model\ResourceModel\CommunicationModel\CommunicationCollection;
use Swift\Marketing\Model\ResourceModel\CommunicationModel\CommunicationCollectionFactory;

/**
 * Get Communication list by search criteria query.
 */
class GetListQuery implements GetCommunicationListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var CommunicationCollectionFactory
     */
    private CommunicationCollectionFactory $entityCollectionFactory;

    /**
     * @var CommunicationDataMapper
     */
    private CommunicationDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var CommunicationSearchResultsInterfaceFactory
     */
    private CommunicationSearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CommunicationCollectionFactory $entityCollectionFactory
     * @param CommunicationDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param CommunicationSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        CommunicationCollectionFactory $entityCollectionFactory,
        CommunicationDataMapper $entityDataMapper,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CommunicationSearchResultsInterfaceFactory $searchResultFactory
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
    public function execute(?SearchCriteriaInterface $searchCriteria = null): CommunicationSearchResultsInterface
    {
        /** @var CommunicationCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var CommunicationSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
