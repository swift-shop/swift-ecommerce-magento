<?php

namespace Swift\Report\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Report\Model\Data\CustomerData;

/**
 * Save Customer Command.
 *
 * @api
 */
interface SaveCustomerInterface
{
/**
* Save Customer.
* @param \Swift\Report\Model\Data\CustomerData $customer
* @return int
* @throws CouldNotSaveException
*/
public function execute(CustomerData $customer): int;
}
