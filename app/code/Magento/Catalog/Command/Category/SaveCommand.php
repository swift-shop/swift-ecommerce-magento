<?php

namespace Magento\Catalog\Command\Category;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Magento\Catalog\Api\SaveCategoryInterface;
use Magento\Catalog\Model\CategoryModel;
use Swift\Catalog\Model\CategoryModelFactory;
use Magento\Catalog\Model\Data\CategoryData;
use Magento\Catalog\Model\ResourceModel\CategoryResource;

/**
 * Save Category Command.
 */
class SaveCommand implements SaveCategoryInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var CategoryModelFactory
     */
    private CategoryModelFactory $modelFactory;

    /**
     * @var CategoryResource
     */
    private CategoryResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param CategoryModelFactory $modelFactory
     * @param CategoryResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        CategoryModelFactory $modelFactory,
        CategoryResource $resource
    ) {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(CategoryData $category): int
    {
        try {
            /** @var CategoryModel $model */
            $model = $this->modelFactory->create();
            $model->addData($category->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(CategoryData::CATEGORY_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Category. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Category.'));
        }

        return (int) $model->getData(CategoryData::CATEGORY_ID);
    }
}
