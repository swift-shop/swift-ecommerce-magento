<?php

namespace Swift\Marketing\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Promotion entity search result.
 */
interface PromotionSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Swift\Marketing\Model\Data\PromotionData[] $items
     *
     * @return PromotionSearchResultsInterface
     */
    public function setItems(array $items): PromotionSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Swift\Marketing\Model\Data\PromotionData[]
     */
    public function getItems(): array;
}
