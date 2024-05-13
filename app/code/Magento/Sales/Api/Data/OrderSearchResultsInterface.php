<?php

namespace Magento\Sales\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Order entity search result.
 */
interface OrderSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Magento\Sales\Model\Data\OrderData[] $items
     *
     * @return OrderSearchResultsInterface
     */
    public function setItems(array $items): OrderSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Magento\Sales\Model\Data\OrderData[]
     */
    public function getItems(): array;
}
