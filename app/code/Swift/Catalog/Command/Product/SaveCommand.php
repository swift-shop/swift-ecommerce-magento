<?php

namespace Swift\Catalog\Command\Product;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Swift\Catalog\Api\Data\ProductInterface;
use Swift\Catalog\Api\SaveProductInterface;
use Swift\Catalog\Model\ProductModel;
use Swift\Catalog\Model\ProductModelFactory;
use Swift\Catalog\Model\ResourceModel\ProductResource;

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
    public function execute(ProductInterface $product): int
    {
        try {
            /** @var ProductModel $model */
            $model = $this->modelFactory->create();
            $model->addData($product->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(ProductInterface::PRODUCT_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
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

        return (int)$model->getData(ProductInterface::PRODUCT_ID);
    }
}
