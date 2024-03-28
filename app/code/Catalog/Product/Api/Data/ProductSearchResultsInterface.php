<?php

namespace Catalog\Product\Api\Data;

/**
 * Get Product list by search criteria query.
 *
 * @api
 */
interface ProductSearchResultsInterface
{
    /**
     * @param array $items
     * @return mixed
     */
    public function setItems(array $items): mixed;
}
