<?php

namespace Magento\Customer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Customer\Api\Data\AddressSearchResultsInterface;

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
* @return \Magento\Customer\Api\Data\AddressSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): AddressSearchResultsInterface;
}
