<?php

namespace Swift\Marketing\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Promotion by id Command.
 *
 * @api
 */
interface DeletePromotionByIdInterface
{
/**
* Delete Promotion.
* @param int $entityId
* @return void
* @throws CouldNotDeleteException
*/
public function execute(int $entityId): void;
}
