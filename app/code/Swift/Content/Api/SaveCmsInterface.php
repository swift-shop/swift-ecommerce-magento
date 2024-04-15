<?php

namespace Swift\Content\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Content\Model\Data\CmsData;

/**
 * Save Cms Command.
 *
 * @api
 */
interface SaveCmsInterface
{
/**
* Save Cms.
* @param \Swift\Content\Model\Data\CmsData $cms
* @return int
* @throws CouldNotSaveException
*/
public function execute(CmsData $cms): int;
}
