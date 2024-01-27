<?php

namespace Swift\Catalog\Command\Product;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Swift\Catalog\Api\Data\ProductInterface;
use Swift\Catalog\Model\ProductModel;
use Swift\Catalog\Model\ProductModelFactory;
use Swift\Catalog\Model\ResourceModel\ProductResource;

/**
 * Delete Product by id Command.
 */
class DeleteByIdCommand
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var ProductModelFactory
     */
    private ProductModelFactory $modelFactory;

    /**
     * @var ProductResource
     */
    private ProductResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param ProductModelFactory $modelFactory
     * @param ProductResource $resource
     */
    public function __construct(
        LoggerInterface     $logger,
        ProductModelFactory $modelFactory,
        ProductResource     $resource
    ) {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * Delete Product.
     *
     * @param int $entityId
     *
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void
    {
        try {
            /** @var ProductModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, ProductInterface::PRODUCT_ID);

            if (!$model->getData(ProductInterface::PRODUCT_ID)) {
                throw new NoSuchEntityException(
                    __(
                        'Could not find Product with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Product. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Product.'));
        }
    }
}
