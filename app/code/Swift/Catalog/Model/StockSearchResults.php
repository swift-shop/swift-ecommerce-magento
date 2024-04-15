<?php

namespace Swift\Catalog\Model;

use Magento\Framework\Api\SearchResults;
use Swift\Catalog\Api\Data\StockSearchResultsInterface;

/**
 * Stock entity search results implementation.
 */
class StockSearchResults extends SearchResults implements StockSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return StockSearchResultsInterface
     */
    public function setItems(array $items): StockSearchResultsInterface
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
