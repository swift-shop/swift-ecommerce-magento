<?php

namespace Magento\Catalog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Catalog\Api\Data\CategorySearchResultsInterface;

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
* @return \Magento\Catalog\Api\Data\CategorySearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): CategorySearchResultsInterface;
}
