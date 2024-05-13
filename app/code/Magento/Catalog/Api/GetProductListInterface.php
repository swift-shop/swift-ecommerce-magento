<?php

namespace Magento\Catalog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Catalog\Api\Data\ProductSearchResultsInterface;

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
* @return \Magento\Catalog\Api\Data\ProductSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): ProductSearchResultsInterface;
}
