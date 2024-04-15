<?php

namespace Swift\Payment\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Payment\Model\Data\SecurityData;

/**
 * Save Security Command.
 *
 * @api
 */
interface SaveSecurityInterface
{
/**
* Save Security.
* @param \Swift\Payment\Model\Data\SecurityData $security
* @return int
* @throws CouldNotSaveException
*/
public function execute(SecurityData $security): int;
}
