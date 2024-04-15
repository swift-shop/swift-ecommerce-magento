<?php

namespace Swift\Sales\Command\Order;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Swift\Sales\Api\SaveOrderInterface;
use Swift\Sales\Model\Data\OrderData;
use Swift\Sales\Model\OrderModel;
use Swift\Sales\Model\OrderModelFactory;
use Swift\Sales\Model\ResourceModel\OrderResource;

/**
 * Save Order Command.
 */
class SaveCommand implements SaveOrderInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var OrderModelFactory
     */
    private OrderModelFactory $modelFactory;

    /**
     * @var OrderResource
     */
    private OrderResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param OrderModelFactory $modelFactory
     * @param OrderResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        OrderModelFactory $modelFactory,
        OrderResource $resource
    ) {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(OrderData $order): int
    {
        try {
            /** @var OrderModel $model */
            $model = $this->modelFactory->create();
            $model->addData($order->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(OrderData::ORDER_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Order. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Order.'));
        }

        return (int) $model->getData(OrderData::ORDER_ID);
    }
}
