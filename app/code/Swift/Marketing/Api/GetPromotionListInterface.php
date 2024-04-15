<?php

namespace Swift\Marketing\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Swift\Marketing\Api\Data\PromotionSearchResultsInterface;

/**
 * Get Promotion list by search criteria query.
 *
 * @api
 */
interface GetPromotionListInterface
{
/**
* Get Promotion list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Swift\Marketing\Api\Data\PromotionSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): PromotionSearchResultsInterface;
}
