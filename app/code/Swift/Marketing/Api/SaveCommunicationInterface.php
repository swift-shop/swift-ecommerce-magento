<?php

namespace Swift\Marketing\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Marketing\Model\Data\CommunicationData;

/**
 * Save Communication Command.
 *
 * @api
 */
interface SaveCommunicationInterface
{
/**
* Save Communication.
* @param \Swift\Marketing\Model\Data\CommunicationData $communication
* @return int
* @throws CouldNotSaveException
*/
public function execute(CommunicationData $communication): int;
}
