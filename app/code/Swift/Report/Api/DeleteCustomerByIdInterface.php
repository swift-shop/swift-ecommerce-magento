<?php

namespace Swift\Report\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Customer by id Command.
 *
 * @api
 */
interface DeleteCustomerByIdInterface
{
/**
* Delete Customer.
* @param int $entityId
* @return void
* @throws CouldNotDeleteException
*/
public function execute(int $entityId): void;
}
