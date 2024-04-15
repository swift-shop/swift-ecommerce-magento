<?php

namespace Swift\Marketing\Model;

use Magento\Framework\Api\SearchResults;
use Swift\Marketing\Api\Data\CommunicationSearchResultsInterface;

/**
 * Communication entity search results implementation.
 */
class CommunicationSearchResults extends SearchResults implements CommunicationSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return CommunicationSearchResultsInterface
     */
    public function setItems(array $items): CommunicationSearchResultsInterface
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
