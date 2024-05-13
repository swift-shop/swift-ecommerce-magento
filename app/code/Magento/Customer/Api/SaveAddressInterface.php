<?php

namespace Magento\Customer\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Customer\Model\Data\AddressData;

/**
 * Save Address Command.
 *
 * @api
 */
interface SaveAddressInterface
{
/**
* Save Address.
* @param \Magento\Customer\Model\Data\AddressData $address
* @return int
* @throws CouldNotSaveException
*/
public function execute(AddressData $address): int;
}
