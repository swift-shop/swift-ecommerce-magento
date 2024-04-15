<?php

namespace Swift\Content\Query\Cms;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Swift\Content\Api\Data\CmsSearchResultsInterface;
use Swift\Content\Api\Data\CmsSearchResultsInterfaceFactory;
use Swift\Content\Api\GetCmsListInterface;
use Swift\Content\Mapper\CmsDataMapper;
use Swift\Content\Model\ResourceModel\CmsModel\CmsCollection;
use Swift\Content\Model\ResourceModel\CmsModel\CmsCollectionFactory;

/**
 * Get Cms list by search criteria query.
 */
class GetListQuery implements GetCmsListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var CmsCollectionFactory
     */
    private CmsCollectionFactory $entityCollectionFactory;

    /**
     * @var CmsDataMapper
     */
    private CmsDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var CmsSearchResultsInterfaceFactory
     */
    private CmsSearchResultsInterfaceFactory $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CmsCollectionFactory $entityCollectionFactory
     * @param CmsDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param CmsSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        CmsCollectionFactory $entityCollectionFactory,
        CmsDataMapper $entityDataMapper,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CmsSearchResultsInterfaceFactory $searchResultFactory
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
    public function execute(?SearchCriteriaInterface $searchCriteria = null): CmsSearchResultsInterface
    {
        /** @var CmsCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var CmsSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
