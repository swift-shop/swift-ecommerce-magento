<?php

    namespace Swift\Customer\Model\Data;

    use Magento\Framework\DataObject;

class AddressData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const ADDRESS_ID = "address_id";

            /**
             * Getter for AddressId.
             *
             * @return int|null
             */
            public function getAddressId(): ?int
            {
                return $this->getData(self::ADDRESS_ID) === null ? null
                    : (int) $this->getData(self::ADDRESS_ID);
            }

            /**
             * Setter for AddressId.
             *
             * @param int|null $addressId
             *
             * @return void
             */
            public function setAddressId(?int $addressId): void
            {
                $this->setData(self::ADDRESS_ID, $addressId);
            }
}
