<?php

namespace Swift\Sales\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Swift\Sales\Api\Data\OrderSearchResultsInterface;

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
* @return \Swift\Sales\Api\Data\OrderSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): OrderSearchResultsInterface;
}
