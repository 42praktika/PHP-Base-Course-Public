<?php

namespace app\models;

use app\core\Model;

class CartItem extends Model
{
    private int $productId;
    private string $productName;
    private string $productImage;
    private int $productPrice;
    private int $productAmount;
    private string $productTitle;
    private string $productDescription;
    private int $productCategoryId;

    /**
     * @param int $productId
     * @param string $productName
     * @param string $productImage
     * @param int $productPrice
     * @param int $productAmount
     * @param string $productTitle
     * @param string $productDescription
     * @param int $productCategoryId
     */


    public function __construct(
        ?int $id,
        int $productId,
        string $productName,
        string $productImage,
        int $productPrice,
        int $productAmount,
        string $productTitle,
        string $productDescription,
        int $productCategoryId

    ) {
        parent::__construct($id);
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productImage = $productImage;
        $this->productPrice = $productPrice;
        $this->productAmount = $productAmount;
        $this->productTitle = $productTitle;
        $this->productDescription = $productDescription;
        $this->productCategoryId = $productCategoryId;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return string
     */
    public function getProductImage(): string
    {
        return $this->productImage;
    }

    /**
     * @param string $productImage
     */
    public function setProductImage(string $productImage): void
    {
        $this->productImage = $productImage;
    }

    /**
     * @return int
     */
    public function getProductPrice(): int
    {
        return $this->productPrice;
    }

    /**
     * @param int $productPrice
     */
    public function setProductPrice(int $productPrice): void
    {
        $this->productPrice = $productPrice;
    }

    /**
     * @return int
     */
    public function getProductAmount(): int
    {
        return $this->productAmount;
    }

    /**
     * @param int $productAmount
     */
    public function setProductAmount(int $productAmount): void
    {
        $this->productAmount = $productAmount;
    }

    /**
     * @return string
     */
    public function getProductTitle(): string
    {
        return $this->productTitle;
    }

    /**
     * @param string $productTitle
     */
    public function setProductTitle(string $productTitle): void
    {
        $this->productTitle = $productTitle;
    }

    /**
     * @return string
     */
    public function getProductDescription(): string
    {
        return $this->productDescription;
    }

    /**
     * @param string $productDescription
     */
    public function setProductDescription(string $productDescription): void
    {
        $this->productDescription = $productDescription;
    }

    /**
     * @return int
     */
    public function getProductCategoryId(): int
    {
        return $this->productCategoryId;
    }

    /**
     * @param int $productCategoryId
     */
    public function setProductCategoryId(int $productCategoryId): void
    {
        $this->productCategoryId = $productCategoryId;
    }

}