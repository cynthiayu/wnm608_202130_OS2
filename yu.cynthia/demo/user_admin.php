<?php

include "../lib/php/functions.php";

$filename = "users.json";
$users = file_get_json($filename);

// pretty_dump($_SERVER);
pretty_dump([$_GET,$_POST]);





if(isset($_POST['user-name'])) {
   $users[$_GET['id']]->name = $_POST['user-name'];
   $users[$_GET['id']]->type = $_POST['user-type'];
   $users[$_GET['id']]->email = $_POST['user-email'];
   $users[$_GET['id']]->classes = explode(", ",$_POST['user-classes']);

   file_put_contents($filename,json_encode($users));
}





function showUserPage($user) {

$id = $_GET['id'];
$classes = implode(", ", $user->classes);

// heredoc
echo <<<HTML
<div class="grid gap">
<div class="col-xs-12">
<div class="card soft">
<nav class="nav crumbs">
   <ul>
      <li><a href="{$_SERVER['PHP_SELF']}">Back</a></li>
   </ul>
</nav>
</div>
</div>
<div class="col-xs-12 col-md-4">
   <div class="card soft">
      <h2>$user->name</h2>
      <div>
         <strong>Type</strong>
         <span>$user->type</span>
      </div>
      <div>
         <strong>Email</strong>
         <span>$user->email</span>
      </div>
      <div>
         <strong>Classes</strong>
         <span>$classes</span>
      </div>
   </div>
</div>
<form class="col-xs-12 col-md-8" method="post">
   <div class="card soft">
      <input type="hidden" name="id" value="$id">
      <div class="form-control">
         <label class="form-label" for="user-name">Name</label>
         <input class="form-input"type="text" id="user-name" name="user-name" value="$user->name">
      </div>
      <div class="form-control">
         <label class="form-label" for="user-type">Type</label>
         <input class="form-input"type="text" id="user-type" name="user-type" value="$user->type">
      </div>
      <div class="form-control">
         <label class="form-label" for="user-email">Email</label>
         <input class="form-input"type="email" id="user-email" name="user-email" value="$user->email">
      </div>
      <div class="form-control">
         <label class="form-label" for="user-classes">Classes</label>
         <input class="form-input"type="text" id="user-classes" name="user-classes" value="$classes">
      </div>
      <div class="form-control">
         <input class="form-button" type="submit" value="Submit">
      </div>
   </div>
</form>
</div>
HTML;
}





?><!DOCTYPE html>
<html lang="en">
<head>
   <title>User Administrator</title>
   <?php include "../parts/meta.php" ?>
</head>
<body>
   <header class="navbar">
      <div class="container display-flex flex-align-center">
         <div class="flex-none">
            <h1>User Admin</h1>
         </div>
         <div class="flex-stretch"></div>
         <nav class="flex-none nav flex">
            <ul>
               <li><a href="<?= $_SERVER['PHP_SELF'] ?>">List</a></li>
            </ul>
         </nav>
      </div>
   </header>

   <div class="container">

         <?php
         if(isset($_GET['id'])) {
            showUserPage($users[$_GET['id']]);
         } else {
         ?>

      <div class="card soft">
         <h2>User List</h2>

         <ul>
         <?php

         for($i=0; $i<count($users); $i++) {
            echo "<li>
            <a href='{$_SERVER['PHP_SELF']}?id=$i'>{$users[$i]->name}</a>
            </li>";
         }

         ?>
         </ul>
      </div>
         <?php
         }
         ?>
   </div>
</body>
</html>