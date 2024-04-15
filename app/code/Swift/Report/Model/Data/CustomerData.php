<?php

    namespace Swift\Report\Model\Data;

    use Magento\Framework\DataObject;

class CustomerData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const CUSTOMER_ID = "customer_id";

            /**
             * Getter for CustomerId.
             *
             * @return int|null
             */
            public function getCustomerId(): ?int
            {
                return $this->getData(self::CUSTOMER_ID) === null ? null
                    : (int) $this->getData(self::CUSTOMER_ID);
            }

            /**
             * Setter for CustomerId.
             *
             * @param int|null $customerId
             *
             * @return void
             */
            public function setCustomerId(?int $customerId): void
            {
                $this->setData(self::CUSTOMER_ID, $customerId);
            }
}
