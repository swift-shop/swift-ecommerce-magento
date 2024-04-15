<?php

namespace Swift\Catalog\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Catalog\Model\Data\ProductData;

/**
 * Save Product Command.
 *
 * @api
 */
interface SaveProductInterface
{
/**
* Save Product.
* @param \Swift\Catalog\Model\Data\ProductData $product
* @return int
* @throws CouldNotSaveException
*/
public function execute(ProductData $product): int;
}
