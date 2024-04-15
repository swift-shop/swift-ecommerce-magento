<?php

namespace Swift\Content\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Cms entity search result.
 */
interface CmsSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Swift\Content\Model\Data\CmsData[] $items
     *
     * @return CmsSearchResultsInterface
     */
    public function setItems(array $items): CmsSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Swift\Content\Model\Data\CmsData[]
     */
    public function getItems(): array;
}
