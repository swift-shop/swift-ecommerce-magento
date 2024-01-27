<?php

namespace Swift\Catalog\Api\Data;

interface ProductInterface
{
    /**
     * String constants for property names
     */
    public const PRODUCT_ID = "product_id";
    public const ID = "id";
    public const CONTENT = "content";

    /**
     * Getter for ProductId.
     *
     * @return int|null
     */
    public function getProductId(): ?int;

    /**
     * Setter for ProductId.
     *
     * @param int|null $productId
     *
     * @return void
     */
    public function setProductId(?int $productId): void;

    /**
     * Getter for Id.
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Setter for Id.
     *
     * @param int|null $id
     *
     * @return void
     */
    public function setId(?int $id): void;

    /**
     * Getter for Content.
     *
     * @return int|null
     */
    public function getContent(): ?int;

    /**
     * Setter for Content.
     *
     * @param int|null $content
     *
     * @return void
     */
    public function setContent(?int $content): void;
}
