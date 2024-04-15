<?php

namespace Swift\Payment\Model;

use Magento\Framework\Api\SearchResults;
use Swift\Payment\Api\Data\SecuritySearchResultsInterface;

/**
 * Security entity search results implementation.
 */
class SecuritySearchResults extends SearchResults implements SecuritySearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return SecuritySearchResultsInterface
     */
    public function setItems(array $items): SecuritySearchResultsInterface
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
