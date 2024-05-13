<?php

namespace Magento\Catalog\Model;

use Magento\Framework\Api\SearchResults;
use Magento\Catalog\Api\Data\ProductSearchResultsInterface;

/**
 * Product entity search results implementation.
 */
class ProductSearchResults extends SearchResults implements ProductSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return ProductSearchResultsInterface
     */
    public function setItems(array $items): ProductSearchResultsInterface
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
