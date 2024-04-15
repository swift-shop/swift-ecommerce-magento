<?php

namespace Swift\Catalog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Product entity search result.
 */
interface ProductSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Swift\Catalog\Model\Data\ProductData[] $items
     *
     * @return ProductSearchResultsInterface
     */
    public function setItems(array $items): ProductSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Swift\Catalog\Model\Data\ProductData[]
     */
    public function getItems(): array;
}
