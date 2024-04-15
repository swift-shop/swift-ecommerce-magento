<?php

namespace Swift\Catalog\Command\Category;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Swift\Catalog\Api\DeleteCategoryByIdInterface;
use Swift\Catalog\Model\CategoryModel;
use Swift\Catalog\Model\CategoryModelFactory;
use Swift\Catalog\Model\Data\CategoryData;
use Swift\Catalog\Model\ResourceModel\CategoryResource;

/**
 * Delete Category by id Command.
 */
class DeleteByIdCommand implements DeleteCategoryByIdInterface
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
    public function execute(int $entityId): void
    {
        try {
            /** @var CategoryModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, CategoryData::CATEGORY_ID);

            if (!$model->getData(CategoryData::CATEGORY_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Category with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Category. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Category.'));
        }
    }
}
