<?php

namespace Magento\Sales\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Sales\Api\Data\OrderSearchResultsInterface;

/**
 * Get Order list by search criteria query.
 *
 * @api
 */
interface GetOrderListInterface
{
/**
* Get Order list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Magento\Sales\Api\Data\OrderSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): OrderSearchResultsInterface;
}
