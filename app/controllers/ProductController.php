<?php
require_once __DIR__ . '/../../app/models/Product.php';
class ProductController 
{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function index() {
        $result = mysqli_query($this->conn, 'SELECT * FROM products');
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $product = new product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setPrice($row['price']);
            $products[] = $product;
        }
        require 'views/product/index.php';
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product();
            $product->setName($_POST['name']);
            $product->setPrice($_POST['email']);
            $name = $product->getName();
            $price = $product->getPrice();
            $sql = "INSERT INTO users (name,email) VALUES (
                '$name',
                '$price'
                ) ";
            $stmt = mysqli_query($this->conn, $sql);
           print_r($_POST['name']);
            header('Location: /darrebni/crud/');
            exit;
        } else {
            require 'views/user/create.php';
        }
    }

    public function edit($id) {
    $res = $this->conn->query("SELECT * FROM products WHERE id = '$id'");
    $result = mysqli_fetch_assoc($res);
    $product = new Product();
    $product->setName($result['name']);
    $product->setPrice($result['price']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $product->setName($_POST['name']);
        $product->setPrice($_POST['email']);
        $name = $product->getName();
        $price = $product->getPrice();
        $stmt = $this->conn->query("UPDATE products SET name = '$name', price = '$price' WHERE id = '$id'");
        header('Location: /darrebni/crud/');
        exit;
    } else {
        require __DIR__ . '/../../views/product/edit.php';
    }
}
public function delete($id)
    {
       $d = $this->conn->query("DELETE FROM products WHERE id = '$id' ");
       header('Location: /darrebni/crud/');

    }

}