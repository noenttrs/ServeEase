<?php

namespace ServeEase\models;

use ServeEase\models\Product;

class ProductManager
{

    private $db;

    function __construct() {
        $this->db = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    }

    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM product");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, Product::class);
    }

    public function getProductById($id)
    {
        $query = $this->db->prepare("SELECT * FROM product WHERE PRODUCT_ID = ?");  
        $query->execute(
            [$id] 
        );
        return $query->fetchObject(Product::class);
    }
}
