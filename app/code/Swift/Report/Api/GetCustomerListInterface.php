<?php

namespace Swift\Report\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Swift\Report\Api\Data\CustomerSearchResultsInterface;

/**
 * Get Customer list by search criteria query.
 *
 * @api
 */
interface GetCustomerListInterface
{
/**
* Get Customer list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Swift\Report\Api\Data\CustomerSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): CustomerSearchResultsInterface;
}
