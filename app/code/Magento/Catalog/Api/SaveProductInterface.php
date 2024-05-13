<?php

namespace Magento\Catalog\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Catalog\Model\Data\ProductData;

/**
 * Save Product Command.
 *
 * @api
 */
interface SaveProductInterface
{
/**
* Save Product.
* @param \Magento\Catalog\Model\Data\ProductData $product
* @return int
* @throws CouldNotSaveException
*/
public function execute(ProductData $product): int;
}
