<?php

namespace Magento\Catalog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Catalog\Api\Data\StockSearchResultsInterface;

/**
 * Get Stock list by search criteria query.
 *
 * @api
 */
interface GetStockListInterface
{
/**
* Get Stock list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Magento\Catalog\Api\Data\StockSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): StockSearchResultsInterface;
}
