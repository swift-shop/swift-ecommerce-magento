<?php

    namespace Swift\Catalog\Model\Data;

    use Magento\Framework\DataObject;

class CategoryData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const CATEGORY_ID = "category_id";

            /**
             * Getter for CategoryId.
             *
             * @return int|null
             */
            public function getCategoryId(): ?int
            {
                return $this->getData(self::CATEGORY_ID) === null ? null
                    : (int) $this->getData(self::CATEGORY_ID);
            }

            /**
             * Setter for CategoryId.
             *
             * @param int|null $categoryId
             *
             * @return void
             */
            public function setCategoryId(?int $categoryId): void
            {
                $this->setData(self::CATEGORY_ID, $categoryId);
            }
}
