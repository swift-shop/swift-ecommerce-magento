<?php

namespace Magento\Catalog\Query\Stock;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Catalog\Api\Data\StockSearchResultsInterface;
use Swift\Catalog\Api\Data\StockSearchResultsInterfaceFactory;
use Magento\Catalog\Api\GetStockListInterface;
use Magento\Catalog\Mapper\StockDataMapper;
use Magento\Catalog\Model\ResourceModel\StockModel\StockCollection;
use Swift\Catalog\Model\ResourceModel\StockModel\StockCollectionFactory;

/**
 * Get Stock list by search criteria query.
 */
class GetListQuery implements GetStockListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var StockCollectionFactory
     */
    private StockCollectionFactory $entityCollectionFactory;

    /**
     * @var StockDataMapper
     */
    private StockDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var StockSearchResultsInterfaceFactory
     */
    private StockSearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param StockCollectionFactory $entityCollectionFactory
     * @param StockDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param StockSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        StockCollectionFactory $entityCollectionFactory,
        StockDataMapper $entityDataMapper,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        StockSearchResultsInterfaceFactory $searchResultFactory
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
    public function execute(?SearchCriteriaInterface $searchCriteria = null): StockSearchResultsInterface
    {
        /** @var StockCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var StockSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
