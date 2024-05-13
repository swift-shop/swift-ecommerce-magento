<?php

namespace Magento\Customer\Query\Address;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Customer\Api\Data\AddressSearchResultsInterface;
use Swift\Customer\Api\Data\AddressSearchResultsInterfaceFactory;
use Magento\Customer\Api\GetAddressListInterface;
use Magento\Customer\Mapper\AddressDataMapper;
use Magento\Customer\Model\ResourceModel\AddressModel\AddressCollection;
use Swift\Customer\Model\ResourceModel\AddressModel\AddressCollectionFactory;

/**
 * Get Address list by search criteria query.
 */
class GetListQuery implements GetAddressListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var AddressCollectionFactory
     */
    private AddressCollectionFactory $entityCollectionFactory;

    /**
     * @var AddressDataMapper
     */
    private AddressDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var AddressSearchResultsInterfaceFactory
     */
    private AddressSearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param AddressCollectionFactory $entityCollectionFactory
     * @param AddressDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param AddressSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        AddressCollectionFactory $entityCollectionFactory,
        AddressDataMapper $entityDataMapper,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        AddressSearchResultsInterfaceFactory $searchResultFactory
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
    public function execute(?SearchCriteriaInterface $searchCriteria = null): AddressSearchResultsInterface
    {
        /** @var AddressCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var AddressSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
