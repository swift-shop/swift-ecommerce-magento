<?php

    namespace Swift\Catalog\Model\Data;

    use Magento\Framework\DataObject;

class ProductData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const PRODUCT_ID = "product_id";

            /**
             * Getter for ProductId.
             *
             * @return int|null
             */
            public function getProductId(): ?int
            {
                return $this->getData(self::PRODUCT_ID) === null ? null
                    : (int) $this->getData(self::PRODUCT_ID);
            }

            /**
             * Setter for ProductId.
             *
             * @param int|null $productId
             *
             * @return void
             */
            public function setProductId(?int $productId): void
            {
                $this->setData(self::PRODUCT_ID, $productId);
            }
}
