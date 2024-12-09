<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'product';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name_product', 'category_product', 'buy_price', 'sell_price', 'stock', 'image'];


    public function getAllProducts()
    {
        $sql = "SELECT * FROM product ORDER BY id DESC";
        return $this->db->query($sql)->getResultObject();
    }

    public function insertProductBy($data)
    {
        $sql = "INSERT INTO product (name_product, category_product, buy_price, sell_price, stock, image) 
        VALUES (:name_product:, :category_product:, :buy_price:, :sell_price:, :stock:)";
        return $this->db->query($sql, $data);
    }

    public function updateProductById($id, $data)
    {
        $sql = "UPDATE product SET name_product = :name_product:, category_product = :category_product:, 
        buy_price = :buy_price:, sell_price = :sell_price:, stock = :stock:, image = :image: WHERE id = :id:";
        return $this->db->query($id, $sql, $data);
    }
}
