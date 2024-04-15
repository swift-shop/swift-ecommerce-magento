<?php

namespace Swift\Content\Model;

use Magento\Framework\Api\SearchResults;
use Swift\Content\Api\Data\CmsSearchResultsInterface;

/**
 * Cms entity search results implementation.
 */
class CmsSearchResults extends SearchResults implements CmsSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return CmsSearchResultsInterface
     */
    public function setItems(array $items): CmsSearchResultsInterface
    {
        return parent::setItems($items);
    }

    /**
     * Get items list.
     *
     * @return array
     */
    public function getItems(): array
    {
        return parent::getItems();
    }
}
