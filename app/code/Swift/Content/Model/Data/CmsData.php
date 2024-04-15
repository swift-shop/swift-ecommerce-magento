<?php

    namespace Swift\Content\Model\Data;

    use Magento\Framework\DataObject;

class CmsData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const CMS_ID = "cms_id";

            /**
             * Getter for CmsId.
             *
             * @return int|null
             */
            public function getCmsId(): ?int
            {
                return $this->getData(self::CMS_ID) === null ? null
                    : (int) $this->getData(self::CMS_ID);
            }

            /**
             * Setter for CmsId.
             *
             * @param int|null $cmsId
             *
             * @return void
             */
            public function setCmsId(?int $cmsId): void
            {
                $this->setData(self::CMS_ID, $cmsId);
            }
}
