<?php

namespace Magento\Customer\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Address entity search result.
 */
interface AddressSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Magento\Customer\Model\Data\AddressData[] $items
     *
     * @return AddressSearchResultsInterface
     */
    public function setItems(array $items): AddressSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Magento\Customer\Model\Data\AddressData[]
     */
    public function getItems(): array;
}
