<?php

include "lib/php/functions.php";

$product = MYSQLIQuery("
   SELECT *
   FROM `products`
   WHERE `id` = {$_GET['id']}
")[0];

$thumbs = explode(",", $product->image_other);

$thumb_elements = array_reduce($thumbs,function($r,$o){
   return $r."<img src='/images/store/$o'>";
});

?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Product List</title>
   
   <?php include "parts/meta.php" ?>
</head>
<body>
   <?php include "parts/navbar.php" ?>
   

   <div class="container">
      <div class="grid gap">
         <div class="col-xs-12 col-md-7">
            <div class="card soft">
               <div class="image-main">
                  <img src="/images/store/<?= $product->image_thumb ?>" />
               </div>
               <div class="image-thumbs"><?= $thumb_elements ?></div>
            </div>
         </div>
         <div class="col-xs-12 col-md-5">
            <div class="card soft">
               <div><?= $product->title ?></div>
               <div>&dollar;<?= $product->price ?></div>
            </div>
         </div>
      </div>
   </div>
</body>
</html>