<?php

namespace Swift\Content\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Cms by id Command.
 *
 * @api
 */
interface DeleteCmsByIdInterface
{
/**
* Delete Cms.
* @param int $entityId
* @return void
* @throws CouldNotDeleteException
*/
public function execute(int $entityId): void;
}
