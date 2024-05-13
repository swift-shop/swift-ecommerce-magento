<?php

namespace Magento\Catalog\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Catalog\Model\Data\StockData;

/**
 * Save Stock Command.
 *
 * @api
 */
interface SaveStockInterface
{
/**
* Save Stock.
* @param \Magento\Catalog\Model\Data\StockData $stock
* @return int
* @throws CouldNotSaveException
*/
public function execute(StockData $stock): int;
}
