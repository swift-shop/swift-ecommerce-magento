<?php

namespace Swift\Marketing\Command\Communication;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Swift\Marketing\Api\DeleteCommunicationByIdInterface;
use Swift\Marketing\Model\CommunicationModel;
use Swift\Marketing\Model\CommunicationModelFactory;
use Swift\Marketing\Model\Data\CommunicationData;
use Swift\Marketing\Model\ResourceModel\CommunicationResource;

/**
 * Delete Communication by id Command.
 */
class DeleteByIdCommand implements DeleteCommunicationByIdInterface
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
    public function execute(int $entityId): void
    {
        try {
            /** @var CommunicationModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, CommunicationData::COMMUNICATION_ID);

            if (!$model->getData(CommunicationData::COMMUNICATION_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Communication with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Communication. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Communication.'));
        }
    }
}
