<?php

namespace Swift\Marketing\Model;

use Magento\Framework\Api\SearchResults;
use Swift\Marketing\Api\Data\PromotionSearchResultsInterface;

/**
 * Promotion entity search results implementation.
 */
class PromotionSearchResults extends SearchResults implements PromotionSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return PromotionSearchResultsInterface
     */
    public function setItems(array $items): PromotionSearchResultsInterface
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
