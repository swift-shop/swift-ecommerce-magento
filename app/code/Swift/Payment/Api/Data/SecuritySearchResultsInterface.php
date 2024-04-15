<?php

namespace Swift\Payment\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Security entity search result.
 */
interface SecuritySearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Swift\Payment\Model\Data\SecurityData[] $items
     *
     * @return SecuritySearchResultsInterface
     */
    public function setItems(array $items): SecuritySearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Swift\Payment\Model\Data\SecurityData[]
     */
    public function getItems(): array;
}
