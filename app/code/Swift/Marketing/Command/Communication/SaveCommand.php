<?php

namespace Swift\Marketing\Command\Communication;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Swift\Marketing\Api\SaveCommunicationInterface;
use Swift\Marketing\Model\CommunicationModel;
use Swift\Marketing\Model\CommunicationModelFactory;
use Swift\Marketing\Model\Data\CommunicationData;
use Swift\Marketing\Model\ResourceModel\CommunicationResource;

/**
 * Save Communication Command.
 */
class SaveCommand implements SaveCommunicationInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var CommunicationModelFactory
     */
    private CommunicationModelFactory $modelFactory;

    /**
     * @var CommunicationResource
     */
    private CommunicationResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param CommunicationModelFactory $modelFactory
     * @param CommunicationResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        CommunicationModelFactory $modelFactory,
        CommunicationResource $resource
    ) {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(CommunicationData $communication): int
    {
        try {
            /** @var CommunicationModel $model */
            $model = $this->modelFactory->create();
            $model->addData($communication->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(CommunicationData::COMMUNICATION_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Communication. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Communication.'));
        }

        return (int) $model->getData(CommunicationData::COMMUNICATION_ID);
    }
}
