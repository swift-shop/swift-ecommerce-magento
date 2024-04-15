<?php

namespace Swift\Report\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Customer entity search result.
 */
interface CustomerSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Swift\Report\Model\Data\CustomerData[] $items
     *
     * @return CustomerSearchResultsInterface
     */
    public function setItems(array $items): CustomerSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Swift\Report\Model\Data\CustomerData[]
     */
    public function getItems(): array;
}
