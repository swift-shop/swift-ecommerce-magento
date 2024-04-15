<?php

namespace Swift\Marketing\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Swift\Marketing\Api\Data\CommunicationSearchResultsInterface;

/**
 * Get Communication list by search criteria query.
 *
 * @api
 */
interface GetCommunicationListInterface
{
/**
* Get Communication list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Swift\Marketing\Api\Data\CommunicationSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): CommunicationSearchResultsInterface;
}
