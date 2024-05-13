<?php

namespace Magento\Catalog\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Product by id Command.
 *
 * @api
 */
interface DeleteProductByIdInterface
{
/**
* Delete Product.
* @param int $entityId
* @return void
* @throws CouldNotDeleteException
*/
public function execute(int $entityId): void;
}
