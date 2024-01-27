<?php

namespace Swift\Catalog\Model\Data;

use Magento\Framework\DataObject;
use Swift\Catalog\Api\Data\ProductInterface;

class ProductData extends DataObject implements ProductInterface
{
    /**
     * Getter for ProductId.
     *
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->getData(self::PRODUCT_ID) === null ? null
            : (int)$this->getData(self::PRODUCT_ID);
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

    /**
     * Getter for Id.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getData(self::ID) === null ? null
            : (int)$this->getData(self::ID);
    }

    /**
     * Setter for Id.
     *
     * @param int|null $id
     *
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->setData(self::ID, $id);
    }

    /**
     * Getter for Content.
     *
     * @return int|null
     */
    public function getContent(): ?int
    {
        return $this->getData(self::CONTENT) === null ? null
            : (int)$this->getData(self::CONTENT);
    }

    /**
     * Setter for Content.
     *
     * @param int|null $content
     *
     * @return void
     */
    public function setContent(?int $content): void
    {
        $this->setData(self::CONTENT, $content);
    }
}
