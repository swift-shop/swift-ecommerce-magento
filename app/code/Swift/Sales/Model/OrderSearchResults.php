<?php

namespace Swift\Sales\Model;

use Magento\Framework\Api\SearchResults;
use Swift\Sales\Api\Data\OrderSearchResultsInterface;

/**
 * Order entity search results implementation.
 */
class OrderSearchResults extends SearchResults implements OrderSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return OrderSearchResultsInterface
     */
    public function setItems(array $items): OrderSearchResultsInterface
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
