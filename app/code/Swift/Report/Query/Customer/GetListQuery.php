<?php

namespace Swift\Report\Query\Customer;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Swift\Report\Api\Data\CustomerSearchResultsInterface;
use Swift\Report\Api\Data\CustomerSearchResultsInterfaceFactory;
use Swift\Report\Api\GetCustomerListInterface;
use Swift\Report\Mapper\CustomerDataMapper;
use Swift\Report\Model\ResourceModel\CustomerModel\CustomerCollection;
use Swift\Report\Model\ResourceModel\CustomerModel\CustomerCollectionFactory;

/**
 * Get Customer list by search criteria query.
 */
class GetListQuery implements GetCustomerListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var CustomerCollectionFactory
     */
    private CustomerCollectionFactory $entityCollectionFactory;

    /**
     * @var CustomerDataMapper
     */
    private CustomerDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var CustomerSearchResultsInterfaceFactory
     */
    private CustomerSearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CustomerCollectionFactory $entityCollectionFactory
     * @param CustomerDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param CustomerSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        CustomerCollectionFactory $entityCollectionFactory,
        CustomerDataMapper $entityDataMapper,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CustomerSearchResultsInterfaceFactory $searchResultFactory
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
    public function execute(?SearchCriteriaInterface $searchCriteria = null): CustomerSearchResultsInterface
    {
        /** @var CustomerCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var CustomerSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
