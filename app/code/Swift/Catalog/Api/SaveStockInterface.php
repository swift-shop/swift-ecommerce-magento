<?php

namespace Swift\Catalog\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Catalog\Model\Data\StockData;

/**
 * Save Stock Command.
 *
 * @api
 */
interface SaveStockInterface
{
/**
* Save Stock.
* @param \Swift\Catalog\Model\Data\StockData $stock
* @return int
* @throws CouldNotSaveException
*/
public function execute(StockData $stock): int;
}
