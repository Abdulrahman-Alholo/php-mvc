<?php
echo "<form method='POST'>";
echo "<label>Product Name:</label><br>";
echo "<input type='text' name='name' value='{$product->getName()}'><br>";
echo "<label>Price:</label><br>";
echo "<input type='text' name='price' value='{$product->getPrice()}'><br>";
echo "<button type='submit'>Save</button>";
echo "</form>";