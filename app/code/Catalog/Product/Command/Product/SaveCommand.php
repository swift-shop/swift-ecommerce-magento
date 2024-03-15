<?php

namespace Catalog\Product\Command\Product;

use Catalog\Product\Api\SaveProductInterface;
use Catalog\Product\Model\Data\ProductData;
use Catalog\Product\Model\ProductModel;
use Catalog\Product\Model\ProductModelFactory;
use Catalog\Product\Model\ResourceModel\ProductResource;
use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

/**
 * Save Product Command.
 */
class SaveCommand implements SaveProductInterface
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
     * @inheritDoc
     */
    public function execute(ProductData $product): int
    {
        try {
            /** @var ProductModel $model */
            $model = $this->modelFactory->create();
            $model->addData($product->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(ProductData::PRODUCT_ID)) {
                $model->isObjectNew(true);
            }
            $this->_getResource($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Product. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Product.'));
        }

        return (int)$model->getData(ProductData::PRODUCT_ID);
    }

    /**
     * @param ProductModel $model
     * @return void
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    private function _getResource(ProductModel $model): void
    {
        $this->resource->save($model);
    }
}
