<?php

namespace Swift\Marketing\Command\Promotion;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Swift\Marketing\Api\SavePromotionInterface;
use Swift\Marketing\Model\Data\PromotionData;
use Swift\Marketing\Model\PromotionModel;
use Swift\Marketing\Model\PromotionModelFactory;
use Swift\Marketing\Model\ResourceModel\PromotionResource;

/**
 * Save Promotion Command.
 */
class SaveCommand implements SavePromotionInterface
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
    public function execute(PromotionData $promotion): int
    {
        try {
            /** @var PromotionModel $model */
            $model = $this->modelFactory->create();
            $model->addData($promotion->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(PromotionData::PROMOTION_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Promotion. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Promotion.'));
        }

        return (int) $model->getData(PromotionData::PROMOTION_ID);
    }
}
