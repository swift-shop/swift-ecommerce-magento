<?php

namespace Swift\Content\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Swift\Content\Api\Data\CmsSearchResultsInterface;

/**
 * Get Cms list by search criteria query.
 *
 * @api
 */
interface GetCmsListInterface
{
/**
* Get Cms list by search criteria.
* @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
* @return \Swift\Content\Api\Data\CmsSearchResultsInterface
*/
public function execute(?SearchCriteriaInterface $searchCriteria = null): CmsSearchResultsInterface;
}
