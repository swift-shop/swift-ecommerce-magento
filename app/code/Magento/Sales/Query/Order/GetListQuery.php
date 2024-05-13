<?php

namespace Magento\Sales\Query\Order;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Sales\Api\Data\OrderSearchResultsInterface;
use Swift\Sales\Api\Data\OrderSearchResultsInterfaceFactory;
use Magento\Sales\Api\GetOrderListInterface;
use Magento\Sales\Mapper\OrderDataMapper;
use Magento\Sales\Model\ResourceModel\OrderModel\OrderCollection;
use Swift\Sales\Model\ResourceModel\OrderModel\OrderCollectionFactory;

/**
 * Get Order list by search criteria query.
 */
class GetListQuery implements GetOrderListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var OrderCollectionFactory
     */
    private OrderCollectionFactory $entityCollectionFactory;

    /**
     * @var OrderDataMapper
     */
    private OrderDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var OrderSearchResultsInterfaceFactory
     */
    private OrderSearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param OrderCollectionFactory $entityCollectionFactory
     * @param OrderDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param OrderSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        OrderCollectionFactory $entityCollectionFactory,
        OrderDataMapper $entityDataMapper,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        OrderSearchResultsInterfaceFactory $searchResultFactory
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
    public function execute(?SearchCriteriaInterface $searchCriteria = null): OrderSearchResultsInterface
    {
        /** @var OrderCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var OrderSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
