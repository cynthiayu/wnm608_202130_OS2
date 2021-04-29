<?php

include "lib/php/functions.php";
include "parts/templates.php";

?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Product List</title>
   
   <?php include "parts/meta.php" ?>
</head>
<body>
   <?php include "parts/navbar.php" ?>

   <div class="container">
      <h2>Product List</h2>

      <div class="grid gap product-list">
      <?php

      $products = MYSQLIQuery("
         SELECT *
         FROM `products`
         ORDER BY `date_create`
         LIMIT 12
      ");

      echo array_reduce($products,'makeProductList');

      ?>
      </div>
   </div>
</body>
</html>