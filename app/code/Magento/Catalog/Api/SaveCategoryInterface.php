<?php

namespace Magento\Catalog\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Catalog\Model\Data\CategoryData;

/**
 * Save Category Command.
 *
 * @api
 */
interface SaveCategoryInterface
{
/**
* Save Category.
* @param \Magento\Catalog\Model\Data\CategoryData $category
* @return int
* @throws CouldNotSaveException
*/
public function execute(CategoryData $category): int;
}
