<?php

namespace Swift\Payment\Command\Security;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Swift\Payment\Api\DeleteSecurityByIdInterface;
use Swift\Payment\Model\Data\SecurityData;
use Swift\Payment\Model\ResourceModel\SecurityResource;
use Swift\Payment\Model\SecurityModel;
use Swift\Payment\Model\SecurityModelFactory;

/**
 * Delete Security by id Command.
 */
class DeleteByIdCommand implements DeleteSecurityByIdInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var SecurityModelFactory
     */
    private SecurityModelFactory $modelFactory;

    /**
     * @var SecurityResource
     */
    private SecurityResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param SecurityModelFactory $modelFactory
     * @param SecurityResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        SecurityModelFactory $modelFactory,
        SecurityResource $resource
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
            /** @var SecurityModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, SecurityData::SECURITY_ID);

            if (!$model->getData(SecurityData::SECURITY_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Security with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Security. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Security.'));
        }
    }
}
