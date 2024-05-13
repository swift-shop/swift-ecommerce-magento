<?php

namespace Magento\Catalog\Command\Stock;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Magento\Catalog\Api\DeleteStockByIdInterface;
use Magento\Catalog\Model\Data\StockData;
use Magento\Catalog\Model\ResourceModel\StockResource;
use Magento\Catalog\Model\StockModel;
use Swift\Catalog\Model\StockModelFactory;

/**
 * Delete Stock by id Command.
 */
class DeleteByIdCommand implements DeleteStockByIdInterface
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
    public function execute(int $entityId): void
    {
        try {
            /** @var StockModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, StockData::STOCK_ID);

            if (!$model->getData(StockData::STOCK_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Stock with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Stock. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Stock.'));
        }
    }
}
