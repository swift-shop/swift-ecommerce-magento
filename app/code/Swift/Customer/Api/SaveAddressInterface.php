<?php

namespace Swift\Customer\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Customer\Model\Data\AddressData;

/**
 * Save Address Command.
 *
 * @api
 */
interface SaveAddressInterface
{
    /**
     * Save Address.
     * @param \Swift\Customer\Model\Data\AddressData $address
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(AddressData $address): int;
}
