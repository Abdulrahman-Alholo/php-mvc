<?php
   echo "<h1>Users</h1>";
   echo "<a href='" . BASE_PATH . "create'>Create User</a>";
   echo " <br><br>";
foreach ($users as $user) {
    $id = $user->getId();
    echo "<li>{$user->getName()} - {$user->getEmail()} <a href='" . BASE_PATH . "edit/{$id}'>Edit</a> <a href='" . BASE_PATH . "delete/{$id}'>Delete</a></li>";
    }

    echo " <br><br>";

    echo "<a href='" . BASE_PATH . "all_products'>All Products</a>";


?>