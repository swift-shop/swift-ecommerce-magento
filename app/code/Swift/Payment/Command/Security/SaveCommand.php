<?php

namespace Swift\Payment\Command\Security;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Swift\Payment\Api\SaveSecurityInterface;
use Swift\Payment\Model\Data\SecurityData;
use Swift\Payment\Model\ResourceModel\SecurityResource;
use Swift\Payment\Model\SecurityModel;
use Swift\Payment\Model\SecurityModelFactory;

/**
 * Save Security Command.
 */
class SaveCommand implements SaveSecurityInterface
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
    public function execute(SecurityData $security): int
    {
        try {
            /** @var SecurityModel $model */
            $model = $this->modelFactory->create();
            $model->addData($security->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(SecurityData::SECURITY_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Security. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Security.'));
        }

        return (int) $model->getData(SecurityData::SECURITY_ID);
    }
}
