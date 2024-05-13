<?php

namespace Magento\Catalog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Product entity search result.
 */
interface ProductSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Magento\Catalog\Model\Data\ProductData[] $items
     *
     * @return ProductSearchResultsInterface
     */
    public function setItems(array $items): ProductSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Magento\Catalog\Model\Data\ProductData[]
     */
    public function getItems(): array;
}
