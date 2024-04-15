<?php

namespace Swift\Customer\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Address entity search result.
 */
interface AddressSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Swift\Customer\Model\Data\AddressData[] $items
     *
     * @return AddressSearchResultsInterface
     */
    public function setItems(array $items): AddressSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Swift\Customer\Model\Data\AddressData[]
     */
    public function getItems(): array;
}
