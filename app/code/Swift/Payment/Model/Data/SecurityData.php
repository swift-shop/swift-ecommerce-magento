<?php

    namespace Swift\Payment\Model\Data;

    use Magento\Framework\DataObject;

class SecurityData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const SECURITY_ID = "security_id";

            /**
             * Getter for SecurityId.
             *
             * @return int|null
             */
            public function getSecurityId(): ?int
            {
                return $this->getData(self::SECURITY_ID) === null ? null
                    : (int) $this->getData(self::SECURITY_ID);
            }

            /**
             * Setter for SecurityId.
             *
             * @param int|null $securityId
             *
             * @return void
             */
            public function setSecurityId(?int $securityId): void
            {
                $this->setData(self::SECURITY_ID, $securityId);
            }
}
