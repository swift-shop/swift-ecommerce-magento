<?php

namespace Swift\Report\Command\Customer;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Swift\Report\Api\SaveCustomerInterface;
use Swift\Report\Model\CustomerModel;
use Swift\Report\Model\CustomerModelFactory;
use Swift\Report\Model\Data\CustomerData;
use Swift\Report\Model\ResourceModel\CustomerResource;

/**
 * Save Customer Command.
 */
class SaveCommand implements SaveCustomerInterface
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
    public function execute(CustomerData $customer): int
    {
        try {
            /** @var CustomerModel $model */
            $model = $this->modelFactory->create();
            $model->addData($customer->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(CustomerData::CUSTOMER_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Customer. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Customer.'));
        }

        return (int) $model->getData(CustomerData::CUSTOMER_ID);
    }
}
