<?php

namespace Swift\Sales\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Order entity search result.
 */
interface OrderSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Swift\Sales\Model\Data\OrderData[] $items
     *
     * @return OrderSearchResultsInterface
     */
    public function setItems(array $items): OrderSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Swift\Sales\Model\Data\OrderData[]
     */
    public function getItems(): array;
}
