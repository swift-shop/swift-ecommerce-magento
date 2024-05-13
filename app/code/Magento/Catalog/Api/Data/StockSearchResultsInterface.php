<?php

namespace Magento\Catalog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Stock entity search result.
 */
interface StockSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Magento\Catalog\Model\Data\StockData[] $items
     *
     * @return StockSearchResultsInterface
     */
    public function setItems(array $items): StockSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Magento\Catalog\Model\Data\StockData[]
     */
    public function getItems(): array;
}
