<?php

    namespace Swift\Marketing\Model\Data;

    use Magento\Framework\DataObject;

class CommunicationData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const COMMUNICATION_ID = "communication_id";

            /**
             * Getter for CommunicationId.
             *
             * @return int|null
             */
            public function getCommunicationId(): ?int
            {
                return $this->getData(self::COMMUNICATION_ID) === null ? null
                    : (int) $this->getData(self::COMMUNICATION_ID);
            }

            /**
             * Setter for CommunicationId.
             *
             * @param int|null $communicationId
             *
             * @return void
             */
            public function setCommunicationId(?int $communicationId): void
            {
                $this->setData(self::COMMUNICATION_ID, $communicationId);
            }
}
