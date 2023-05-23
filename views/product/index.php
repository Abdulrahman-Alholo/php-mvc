<?php
   echo "<h1>Products</h1>";
   echo "<a href='" . BASE_PATH . "add_product'>Add Product</a> <br>";
   echo "<br><br>";
foreach ($products as $product) {
    $id = $product->getId();
    echo "<li>{$product->getName()} - {$product->getPrice()} <a href='" . BASE_PATH . "edit_product/{$id}'>Edit</a> <a href='" . BASE_PATH . "delete_product/{$id}'>Delete</a></li>";
    }

?>