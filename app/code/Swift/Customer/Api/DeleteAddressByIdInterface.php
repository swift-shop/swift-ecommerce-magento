<?php

namespace Swift\Customer\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Address by id Command.
 *
 * @api
 */
interface DeleteAddressByIdInterface
{
    /**
     * Delete Address.
     * @param int $entityId
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void;
}
