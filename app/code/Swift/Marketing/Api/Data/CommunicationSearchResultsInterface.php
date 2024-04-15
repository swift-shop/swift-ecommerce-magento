<?php

namespace Swift\Marketing\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Communication entity search result.
 */
interface CommunicationSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Swift\Marketing\Model\Data\CommunicationData[] $items
     *
     * @return CommunicationSearchResultsInterface
     */
    public function setItems(array $items): CommunicationSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Swift\Marketing\Model\Data\CommunicationData[]
     */
    public function getItems(): array;
}
