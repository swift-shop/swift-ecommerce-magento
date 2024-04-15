<?php

    namespace Swift\Sales\Model\Data;

    use Magento\Framework\DataObject;

class OrderData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const ORDER_ID = "order_id";

            /**
             * Getter for OrderId.
             *
             * @return int|null
             */
            public function getOrderId(): ?int
            {
                return $this->getData(self::ORDER_ID) === null ? null
                    : (int) $this->getData(self::ORDER_ID);
            }

            /**
             * Setter for OrderId.
             *
             * @param int|null $orderId
             *
             * @return void
             */
            public function setOrderId(?int $orderId): void
            {
                $this->setData(self::ORDER_ID, $orderId);
            }
}
