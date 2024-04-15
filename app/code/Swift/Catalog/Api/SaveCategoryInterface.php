<?php

namespace Swift\Catalog\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Swift\Catalog\Model\Data\CategoryData;

/**
 * Save Category Command.
 *
 * @api
 */
interface SaveCategoryInterface
{
/**
* Save Category.
* @param \Swift\Catalog\Model\Data\CategoryData $category
* @return int
* @throws CouldNotSaveException
*/
public function execute(CategoryData $category): int;
}
