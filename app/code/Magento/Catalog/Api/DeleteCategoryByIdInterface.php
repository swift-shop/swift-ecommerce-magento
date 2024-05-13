<?php

namespace Magento\Catalog\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Category by id Command.
 *
 * @api
 */
interface DeleteCategoryByIdInterface
{
/**
* Delete Category.
* @param int $entityId
* @return void
* @throws CouldNotDeleteException
*/
public function execute(int $entityId): void;
}
