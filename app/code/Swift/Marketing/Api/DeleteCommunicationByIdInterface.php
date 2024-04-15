<?php

namespace Swift\Marketing\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Communication by id Command.
 *
 * @api
 */
interface DeleteCommunicationByIdInterface
{
/**
* Delete Communication.
* @param int $entityId
* @return void
* @throws CouldNotDeleteException
*/
public function execute(int $entityId): void;
}
