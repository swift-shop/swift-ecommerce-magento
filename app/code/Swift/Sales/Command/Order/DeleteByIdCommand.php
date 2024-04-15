<?php

namespace Swift\Sales\Command\Order;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Swift\Sales\Api\DeleteOrderByIdInterface;
use Swift\Sales\Model\Data\OrderData;
use Swift\Sales\Model\OrderModel;
use Swift\Sales\Model\OrderModelFactory;
use Swift\Sales\Model\ResourceModel\OrderResource;

/**
 * Delete Order by id Command.
 */
class DeleteByIdCommand implements DeleteOrderByIdInterface
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
    public function execute(int $entityId): void
    {
        try {
            /** @var OrderModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, OrderData::ORDER_ID);

            if (!$model->getData(OrderData::ORDER_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Order with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Order. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Order.'));
        }
    }
}
