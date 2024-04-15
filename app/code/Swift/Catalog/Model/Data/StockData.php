<?php

    namespace Swift\Catalog\Model\Data;

    use Magento\Framework\DataObject;

class StockData extends DataObject  
{
            /**
             * String constants for property names.
             */
                public const STOCK_ID = "stock_id";

            /**
             * Getter for StockId.
             *
             * @return int|null
             */
            public function getStockId(): ?int
            {
                return $this->getData(self::STOCK_ID) === null ? null
                    : (int) $this->getData(self::STOCK_ID);
            }

            /**
             * Setter for StockId.
             *
             * @param int|null $stockId
             *
             * @return void
             */
            public function setStockId(?int $stockId): void
            {
                $this->setData(self::STOCK_ID, $stockId);
            }
}
