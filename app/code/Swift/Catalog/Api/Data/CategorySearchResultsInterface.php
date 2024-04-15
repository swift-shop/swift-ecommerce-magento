<?php

namespace Swift\Catalog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Category entity search result.
 */
interface CategorySearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Swift\Catalog\Model\Data\CategoryData[] $items
     *
     * @return CategorySearchResultsInterface
     */
    public function setItems(array $items): CategorySearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Swift\Catalog\Model\Data\CategoryData[]
     */
    public function getItems(): array;
}
