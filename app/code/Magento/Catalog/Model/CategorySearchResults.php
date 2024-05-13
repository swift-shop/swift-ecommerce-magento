<?php

namespace Magento\Catalog\Model;

use Magento\Framework\Api\SearchResults;
use Magento\Catalog\Api\Data\CategorySearchResultsInterface;

/**
 * Category entity search results implementation.
 */
class CategorySearchResults extends SearchResults implements CategorySearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return CategorySearchResultsInterface
     */
    public function setItems(array $items): CategorySearchResultsInterface
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
