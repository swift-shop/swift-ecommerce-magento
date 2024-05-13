<?php

namespace Magento\Catalog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Category entity search result.
 */
interface CategorySearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Magento\Catalog\Model\Data\CategoryData[] $items
     *
     * @return CategorySearchResultsInterface
     */
    public function setItems(array $items): CategorySearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Magento\Catalog\Model\Data\CategoryData[]
     */
    public function getItems(): array;
}
