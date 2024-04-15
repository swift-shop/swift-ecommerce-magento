<?php

namespace Swift\Report\Command\Customer;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Swift\Report\Api\DeleteCustomerByIdInterface;
use Swift\Report\Model\CustomerModel;
use Swift\Report\Model\CustomerModelFactory;
use Swift\Report\Model\Data\CustomerData;
use Swift\Report\Model\ResourceModel\CustomerResource;

/**
 * Delete Customer by id Command.
 */
class DeleteByIdCommand implements DeleteCustomerByIdInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var CustomerModelFactory
     */
    private CustomerModelFactory $modelFactory;

    /**
     * @var CustomerResource
     */
    private CustomerResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param CustomerModelFactory $modelFactory
     * @param CustomerResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        CustomerModelFactory $modelFactory,
        CustomerResource $resource
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
            /** @var CustomerModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, CustomerData::CUSTOMER_ID);

            if (!$model->getData(CustomerData::CUSTOMER_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Customer with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Customer. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Customer.'));
        }
    }
}
