<?php

namespace Magento\Sales\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Sales\Model\Data\OrderData;

/**
 * Save Order Command.
 *
 * @api
 */
interface SaveOrderInterface
{
/**
* Save Order.
* @param \Magento\Sales\Model\Data\OrderData $order
* @return int
* @throws CouldNotSaveException
*/
public function execute(OrderData $order): int;
}
