<?php

namespace Swift\Customer\Command\Address;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Swift\Customer\Api\SaveAddressInterface;
use Swift\Customer\Model\AddressModel;
use Swift\Customer\Model\AddressModelFactory;
use Swift\Customer\Model\Data\AddressData;
use Swift\Customer\Model\ResourceModel\AddressResource;

/**
 * Save Address Command.
 */
class SaveCommand implements SaveAddressInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var AddressModelFactory
     */
    private AddressModelFactory $modelFactory;

    /**
     * @var AddressResource
     */
    private AddressResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param AddressModelFactory $modelFactory
     * @param AddressResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        AddressModelFactory $modelFactory,
        AddressResource $resource
    ) {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(AddressData $address): int
    {
        try {
            /** @var AddressModel $model */
            $model = $this->modelFactory->create();
            $model->addData($address->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(AddressData::ADDRESS_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Address. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Address.'));
        }

        return (int) $model->getData(AddressData::ADDRESS_ID);
    }
}
