<?php

namespace Catalog\Product\Api;

use Catalog\Product\Api\Data\ProductSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Get Product list by search criteria query.
 *
 * @api
 */
interface GetProductInfoInterface
{
    /**
     * Get Product list by search criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
     * @return \Catalog\Product\Api\Data\ProductSearchResultsInterface
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): ProductSearchResultsInterface;
}
