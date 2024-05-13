<?php

namespace Magento\Customer\Command\Address;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Magento\Customer\Api\DeleteAddressByIdInterface;
use Magento\Customer\Model\AddressModel;
use Swift\Customer\Model\AddressModelFactory;
use Magento\Customer\Model\Data\AddressData;
use Magento\Customer\Model\ResourceModel\AddressResource;

/**
 * Delete Address by id Command.
 */
class DeleteByIdCommand implements DeleteAddressByIdInterface
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
    public function execute(int $entityId): void
    {
        try {
            /** @var AddressModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, AddressData::ADDRESS_ID);

            if (!$model->getData(AddressData::ADDRESS_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Address with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Address. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Address.'));
        }
    }
}
