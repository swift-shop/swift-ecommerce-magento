<?php

namespace Swift\Catalog\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Stock by id Command.
 *
 * @api
 */
interface DeleteStockByIdInterface
{
/**
* Delete Stock.
* @param int $entityId
* @return void
* @throws CouldNotDeleteException
*/
public function execute(int $entityId): void;
}
