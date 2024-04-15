<?php

namespace Swift\Payment\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Security by id Command.
 *
 * @api
 */
interface DeleteSecurityByIdInterface
{
/**
* Delete Security.
* @param int $entityId
* @return void
* @throws CouldNotDeleteException
*/
public function execute(int $entityId): void;
}
