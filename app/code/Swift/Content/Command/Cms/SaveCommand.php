<?php

namespace Swift\Content\Command\Cms;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use Swift\Content\Api\SaveCmsInterface;
use Swift\Content\Model\CmsModel;
use Swift\Content\Model\CmsModelFactory;
use Swift\Content\Model\Data\CmsData;
use Swift\Content\Model\ResourceModel\CmsResource;

/**
 * Save Cms Command.
 */
class SaveCommand implements SaveCmsInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var CmsModelFactory
     */
    private CmsModelFactory $modelFactory;

    /**
     * @var CmsResource
     */
    private CmsResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param CmsModelFactory $modelFactory
     * @param CmsResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        CmsModelFactory $modelFactory,
        CmsResource $resource
    ) {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(CmsData $cms): int
    {
        try {
            /** @var CmsModel $model */
            $model = $this->modelFactory->create();
            $model->addData($cms->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(CmsData::CMS_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Cms. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Cms.'));
        }

        return (int) $model->getData(CmsData::CMS_ID);
    }
}
