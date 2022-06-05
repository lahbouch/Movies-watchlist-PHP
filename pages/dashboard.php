<?php
session_start();
if (!isset($_SESSION['userName'])) {
   header("Location: ./error.php");
}

$userName = $_SESSION['userName'];
$userData = $_SESSION['userData'];
$name = $_SESSION["name"];



$movies = fopen($userData, "r");
$img = "../data/img/{$_SESSION['userName']}/";








?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
   <title>Document</title>
   <style>
      #logOutBtn {
         position: fixed;
         right: 20px;
         bottom: 20px;
      }
   </style>
</head>

<body>
   <a href="../action/logout.php" id="logOutBtn" class="text-decoration-none rounded p-2 text-light bg-secondary">Log out</a>
   <div class="container vh-100 d-flex flex-column flex-start pt-2 align-items-center w-100 ">
      <form class="w-25 d-flex flex-column gap-2">
         <h3 class="lead h4 text-center">Welcome <?= $_SESSION["name"] ?> to Your Watch list</h3>
         <input placeholder="Search for a movie ..." type="search" name="q" class="w-100 rounded border border-secondary p-3" style="height:40px ;">
         <a href="../action/add.php" class="btn btn-primary">Add new movies</a>
      </form>


      <?php

      if (isset($_GET['q'])) {
         $q =  $_GET['q'];
         if ($q == "") {
            while (!feof($movies)) {
               $movie = fgets($movies);
               if ($movie == "") continue;
               $movie = explode(";", $movie);
               $mvImg =  $img . $movie[3];
               echo " <div class='card mt-2 mb-2' style='min-width: 640px;'>
               <div class='row g-0'>
                  <div class='col-md-4'>
                     <img src='$mvImg' class='img-fluid rounded-start' alt='...'>
                  </div>
                  <div class='col-md-8'>
                     <div class='card-body'>
                        <h5 class='card-title'>{$movie[0]}</h5>
                        <p class='card-text'>{$movie[1]}</p>
                        <p class='card-text text-muted'><i class='bi bi-clock-history '></i>&nbsp;{$movie[2]}</p>
                        <p class='card-text d-flex gap-2'>
      
                           <a href='../action/update.php' class='btn btn-secondary'><i class='bi bi-arrow-bar-up '></i>&nbsp;Update</a>
                           <a href='../action/delete.php' class='btn btn-danger'><i class='bi bi-eraser '></i>&nbsp;Remove</a>
      
                        </p>
                     </div>
                  </div>
               </div>
            </div> ";
            }
            exit;
         }
         while (!feof($movies)) {
            $movie = fgets($movies);
            if ($movie == "") continue;
            $movie = explode(";", $movie);
            $mvImg =  $img . $movie[3];
            if (strtolower($movie[0]) == strtolower($q)) {
               echo " <div class='card mt-2 mb-2' style='min-width: 640px;'>
            <div class='row g-0'>
               <div class='col-md-4'>
                  <img src='$mvImg' class='img-fluid rounded-start' alt='...'>
               </div>
               <div class='col-md-8'>
                  <div class='card-body'>
                     <h5 class='card-title'>{$movie[0]}</h5>
                     <p class='card-text'>{$movie[1]}</p>
                     <p class='card-text text-muted'><i class='bi bi-clock-history '></i>&nbsp;{$movie[2]}</p>
                     <p class='card-text d-flex gap-2'>
   
                        <a href='../action/update.php' class='btn btn-secondary'><i class='bi bi-arrow-bar-up '></i>&nbsp;Update</a>
                        <a href='../action/delete.php' class='btn btn-danger'><i class='bi bi-eraser '></i>&nbsp;Remove</a>
   
                     </p>
                  </div>
               </div>
            </div>
         </div> ";
            }
         }
      } else {
         while (!feof($movies)) {
            $movie = fgets($movies);
            if ($movie == "") continue;
            $movie = explode(";", $movie);
            $mvImg =  $img . $movie[3];
            echo " <div class='card mt-2 mb-2' style='min-width: 640px;'>
            <div class='row g-0'>
               <div class='col-md-4'>
                  <img src='$mvImg' class='img-fluid rounded-start' alt='...'>
               </div>
               <div class='col-md-8'>
                  <div class='card-body'>
                     <h5 class='card-title'>{$movie[0]}</h5>
                     <p class='card-text'>{$movie[1]}</p>
                     <p class='card-text text-muted'><i class='bi bi-clock-history '></i>&nbsp;{$movie[2]}</p>
                     <p class='card-text d-flex gap-2'>
   
                        <a href='../action/update.php' class='btn btn-secondary'><i class='bi bi-arrow-bar-up '></i>&nbsp;Update</a>
                        <a href='../action/delete.php' class='btn btn-danger'><i class='bi bi-eraser '></i>&nbsp;Remove</a>
   
                     </p>
                  </div>
               </div>
            </div>
         </div> ";
         }
      }






      ?>



   </div>
</body>

</html>