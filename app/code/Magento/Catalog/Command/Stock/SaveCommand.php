<?php

namespace Magento\Catalog\Command\Stock;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Magento\Catalog\Api\SaveStockInterface;
use Magento\Catalog\Model\Data\StockData;
use Magento\Catalog\Model\ResourceModel\StockResource;
use Magento\Catalog\Model\StockModel;
use Swift\Catalog\Model\StockModelFactory;

/**
 * Save Stock Command.
 */
class SaveCommand implements SaveStockInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var StockModelFactory
     */
    private StockModelFactory $modelFactory;

    /**
     * @var StockResource
     */
    private StockResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param StockModelFactory $modelFactory
     * @param StockResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        StockModelFactory $modelFactory,
        StockResource $resource
    ) {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(StockData $stock): int
    {
        try {
            /** @var StockModel $model */
            $model = $this->modelFactory->create();
            $model->addData($stock->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(StockData::STOCK_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Stock. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Stock.'));
        }

        return (int) $model->getData(StockData::STOCK_ID);
    }
}
