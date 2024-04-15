<?php

namespace Swift\Marketing\Command\Promotion;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Swift\Marketing\Api\DeletePromotionByIdInterface;
use Swift\Marketing\Model\Data\PromotionData;
use Swift\Marketing\Model\PromotionModel;
use Swift\Marketing\Model\PromotionModelFactory;
use Swift\Marketing\Model\ResourceModel\PromotionResource;

/**
 * Delete Promotion by id Command.
 */
class DeleteByIdCommand implements DeletePromotionByIdInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var PromotionModelFactory
     */
    private PromotionModelFactory $modelFactory;

    /**
     * @var PromotionResource
     */
    private PromotionResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param PromotionModelFactory $modelFactory
     * @param PromotionResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        PromotionModelFactory $modelFactory,
        PromotionResource $resource
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
            /** @var PromotionModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, PromotionData::PROMOTION_ID);

            if (!$model->getData(PromotionData::PROMOTION_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Promotion with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Promotion. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Promotion.'));
        }
    }
}
