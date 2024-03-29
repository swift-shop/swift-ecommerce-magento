<?php

namespace Catalog\Product\Query\Product;

use Catalog\Product\Api\Data\ProductSearchResultsInterface;
use Catalog\Product\Api\Data\ProductSearchResultsInterfaceFactory;
use Catalog\Product\Api\GetProductInfoInterface;
use Catalog\Product\Mapper\ProductDataMapper;
use Catalog\Product\Model\ResourceModel\ProductModel\ProductCollection;
use Catalog\Product\Model\ResourceModel\ProductModel\ProductCollectionFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

/**
 * Get Product list by search criteria query.
 */
class GetProductListQuery implements GetProductInfoInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var ProductCollectionFactory
     */
    private ProductCollectionFactory $entityCollectionFactory;

    /**
     * @var ProductDataMapper
     */
    private ProductDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var ProductSearchResultsInterfaceFactory
     */
    private ProductSearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param ProductCollectionFactory $entityCollectionFactory
     * @param ProductDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param ProductSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface         $collectionProcessor,
        ProductCollectionFactory             $entityCollectionFactory,
        ProductDataMapper                    $entityDataMapper,
        SearchCriteriaBuilder                $searchCriteriaBuilder,
        ProductSearchResultsInterfaceFactory $searchResultFactory
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
    public function execute(?SearchCriteriaInterface $searchCriteria = null): ProductSearchResultsInterface
    {
        /** @var ProductCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var ProductSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
