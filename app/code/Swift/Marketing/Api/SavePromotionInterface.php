<?php

namespace Swift\Marketing\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Marketing\Model\Data\PromotionData;

/**
 * Save Promotion Command.
 *
 * @api
 */
interface SavePromotionInterface
{
/**
* Save Promotion.
* @param \Swift\Marketing\Model\Data\PromotionData $promotion
* @return int
* @throws CouldNotSaveException
*/
public function execute(PromotionData $promotion): int;
}
