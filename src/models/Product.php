<?php

namespace ServeEase\models;

class Product
{
    private $PRODUCT_ID;
    private $PRODUCT_TYPE_MENU;
    private $PRODUCT_NAME;
    private $PRODUCT_IMAGE;
    private $PRODUCT_DESCRIPTION;
    private $PRODUCT_ALLERGEN;
    private $PRODUCT_PRICE;
    private $PRODUCT_TYPE;


    private $productQuantity;

    public function __construct()
    {
    }

    // public function setAll($productId, $productTypeMenu, $productName, $productImage, $productDescription, $productAllergens, $productPrice)
    // {
    //     $this->PRODUCT_ID = $productId;
    //     $this->PRODUCT_TYPE_MENU = $productTypeMenu;
    //     $this->PRODUCT_NAME = $productName;
    //     $this->PRODUCT_IMAGE = $productImage;
    //     $this->PRODUCT_DESCRIPTION = $productDescription;
    //     $this->PRODUCT_ALLERGEN = $productAllergens;
    //     $this->PRODUCT_PRICE = $productPrice;
    // }


    public function setProductId($productId)
    {
        $this->PRODUCT_ID = $productId;
    }

    public function getProductId()
    {
        return $this->PRODUCT_ID;
    }

    public function setProductTypeMenu($productTypeMenu)
    {
        $this->PRODUCT_TYPE_MENU = $productTypeMenu;
    }

    public function getProductTypeMenu()
    {
        return $this->PRODUCT_TYPE_MENU;
    }

    public function setProductName($productName)
    {
        $this->PRODUCT_NAME = $productName;
    }

    public function getProductName()
    {
        return $this->PRODUCT_NAME;
    }

    public function setProductImage($productImage)
    {
        $this->PRODUCT_IMAGE = $productImage;
    }

    public function getProductImage()
    {
        return $this->PRODUCT_IMAGE;
    }

    public function setProductDescription($productDescription)
    {
        $this->PRODUCT_DESCRIPTION = $productDescription;
    }

    public function getProductDescription()
    {
        return $this->PRODUCT_DESCRIPTION;
    }

    public function setProductAllergens($productAllergens)
    {
        $this->PRODUCT_ALLERGEN = $productAllergens;
    }

    public function getProductAllergens()
    {
        return $this->PRODUCT_ALLERGEN;
    }

    public function setProductPrice($productPrice)
    {
        $this->PRODUCT_PRICE = $productPrice;
    }

    public function getProductPrice()
    {
        return $this->PRODUCT_PRICE;
    }

    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = $productQuantity;
    }

    public function getProductQuantity()
    {
        return $this->productQuantity;
    }

    public function setProductType($productType)
    {
        $this->PRODUCT_TYPE = $productType;
    }

    public function getProductType()
    {
        return $this->PRODUCT_TYPE;
    }
}
