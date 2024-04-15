<?php

namespace Swift\Catalog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Swift\Catalog\Api\Data\CategorySearchResultsInterface;

/**
 * Get Category list by search criteria query.
 *
 * @api
 */
interface GetCategoryListInterface
{
/**
* Get Category list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Swift\Catalog\Api\Data\CategorySearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): CategorySearchResultsInterface;
}
