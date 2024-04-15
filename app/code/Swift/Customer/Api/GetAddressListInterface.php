<?php

namespace Swift\Customer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Swift\Customer\Api\Data\AddressSearchResultsInterface;

/**
 * Get Address list by search criteria query.
 *
 * @api
 */
interface GetAddressListInterface
{
/**
* Get Address list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Swift\Customer\Api\Data\AddressSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): AddressSearchResultsInterface;
}
