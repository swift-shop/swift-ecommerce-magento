<?php

namespace Swift\Payment\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Swift\Payment\Api\Data\SecuritySearchResultsInterface;

/**
 * Get Security list by search criteria query.
 *
 * @api
 */
interface GetSecurityListInterface
{
/**
* Get Security list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Swift\Payment\Api\Data\SecuritySearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): SecuritySearchResultsInterface;
}
