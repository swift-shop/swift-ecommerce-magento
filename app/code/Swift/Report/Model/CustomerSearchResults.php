<?php

namespace Swift\Report\Model;

use Magento\Framework\Api\SearchResults;
use Swift\Report\Api\Data\CustomerSearchResultsInterface;

/**
 * Customer entity search results implementation.
 */
class CustomerSearchResults extends SearchResults implements CustomerSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return CustomerSearchResultsInterface
     */
    public function setItems(array $items): CustomerSearchResultsInterface
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
