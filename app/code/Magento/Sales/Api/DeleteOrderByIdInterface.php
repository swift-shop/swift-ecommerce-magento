<?php

namespace Magento\Sales\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Order by id Command.
 *
 * @api
 */
interface DeleteOrderByIdInterface
{
/**
* Delete Order.
* @param int $entityId
* @return void
* @throws CouldNotDeleteException
*/
public function execute(int $entityId): void;
}
