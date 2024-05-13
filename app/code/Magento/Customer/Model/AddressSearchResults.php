<?php

namespace Magento\Customer\Model;

use Magento\Framework\Api\SearchResults;
use Magento\Customer\Api\Data\AddressSearchResultsInterface;

/**
 * Address entity search results implementation.
 */
class AddressSearchResults extends SearchResults implements AddressSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return AddressSearchResultsInterface
     */
    public function setItems(array $items): AddressSearchResultsInterface
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
