<?php

    namespace Swift\Marketing\Model\Data;

    use Magento\Framework\DataObject;

class PromotionData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const PROMOTION_ID = "promotion_id";

            /**
             * Getter for PromotionId.
             *
             * @return int|null
             */
            public function getPromotionId(): ?int
            {
                return $this->getData(self::PROMOTION_ID) === null ? null
                    : (int) $this->getData(self::PROMOTION_ID);
            }

            /**
             * Setter for PromotionId.
             *
             * @param int|null $promotionId
             *
             * @return void
             */
            public function setPromotionId(?int $promotionId): void
            {
                $this->setData(self::PROMOTION_ID, $promotionId);
            }
}
