<?php

namespace Swift\Content\Command\Cms;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Swift\Content\Api\DeleteCmsByIdInterface;
use Swift\Content\Model\CmsModel;
use Swift\Content\Model\CmsModelFactory;
use Swift\Content\Model\Data\CmsData;
use Swift\Content\Model\ResourceModel\CmsResource;

/**
 * Delete Cms by id Command.
 */
class DeleteByIdCommand implements DeleteCmsByIdInterface
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
    public function execute(int $entityId): void
    {
        try {
            /** @var CmsModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, CmsData::CMS_ID);

            if (!$model->getData(CmsData::CMS_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Cms with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Cms. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Cms.'));
        }
    }
}
