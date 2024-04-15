<?php

namespace Swift\Catalog\Query\Category;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Swift\Catalog\Api\Data\CategorySearchResultsInterface;
use Swift\Catalog\Api\Data\CategorySearchResultsInterfaceFactory;
use Swift\Catalog\Api\GetCategoryListInterface;
use Swift\Catalog\Mapper\CategoryDataMapper;
use Swift\Catalog\Model\ResourceModel\CategoryModel\CategoryCollection;
use Swift\Catalog\Model\ResourceModel\CategoryModel\CategoryCollectionFactory;

/**
 * Get Category list by search criteria query.
 */
class GetListQuery implements GetCategoryListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var CategoryCollectionFactory
     */
    private CategoryCollectionFactory $entityCollectionFactory;

    /**
     * @var CategoryDataMapper
     */
    private CategoryDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var CategorySearchResultsInterfaceFactory
     */
    private CategorySearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CategoryCollectionFactory $entityCollectionFactory
     * @param CategoryDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param CategorySearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        CategoryCollectionFactory $entityCollectionFactory,
        CategoryDataMapper $entityDataMapper,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CategorySearchResultsInterfaceFactory $searchResultFactory
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
    public function execute(?SearchCriteriaInterface $searchCriteria = null): CategorySearchResultsInterface
    {
        /** @var CategoryCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var CategorySearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
