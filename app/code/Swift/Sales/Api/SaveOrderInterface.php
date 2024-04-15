<?php

namespace Swift\Sales\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Sales\Model\Data\OrderData;

/**
 * Save Order Command.
 *
 * @api
 */
interface SaveOrderInterface
{
/**
* Save Order.
* @param \Swift\Sales\Model\Data\OrderData $order
* @return int
* @throws CouldNotSaveException
*/
public function execute(OrderData $order): int;
}
