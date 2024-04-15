<?php

namespace Swift\Catalog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Swift\Catalog\Api\Data\ProductSearchResultsInterface;

/**
 * Get Product list by search criteria query.
 *
 * @api
 */
interface GetProductListInterface
{
/**
* Get Product list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Swift\Catalog\Api\Data\ProductSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): ProductSearchResultsInterface;
}
