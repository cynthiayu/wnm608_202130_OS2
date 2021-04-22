<!DOCTYPE html>
<html lang="en">
<head>

   <title>Product List</title>
     <?php include "parts/meta.php" ?>
</head>
<body>

   <?php include "parts/navbar.php" ?>

   <div class="container">
      <div class="card soft">
         <h2>Product Item</h2>

         <div>This is product item: #<?= $_GET['id']?></div>
      </div>
   </div>
</body>
</html>