<?php

require_once "../data/movie.php";

session_start();
if (!isset($_SESSION['userName'])) {
    header("Location: ./error.php");
}
$userName = $_SESSION['userName'];
$userData = $_SESSION['userData'];


if (isset($_POST["submit"])) {
    $mvName = $_POST["mvName"];
    $mvDesc = $_POST["mvDesc"];
    $schTime = $_POST["schTime"];
    $isertedData = [$mvName, $mvDesc, $schTime];
    try {
        if (in_array("", $isertedData)) {
            throw new Error("Please Fill all the information");
        }

        $img = $_FILES['mvPic'];
        if ($img['error'] == 4) {
            throw new Error("Please Choose an image...");
        }



        if ($img['size'] > 1000000) {
            throw new Error("the image should be less than 1MB ... ");
        }


        if (explode("/", $img['type'])[1] != "jpeg") {

            throw new Error("the file should be jpeg ... ");
        };







        $m = new Movie($mvName, $mvDesc, $schTime, $img);


        header("Location: ../pages/dashboard.php");
    } catch (Error $e) {
        echo $e->getMessage();
    }
}






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
</head>

<body>
    <div class="container vh-100 d-flex flex-column justify-content-center">
        <form class="d-flex flex-column gap-3" method="POST" enctype="multipart/form-data">
            <h1 class="h4 text-center">Add new movie to your watch list</h1>
            <input class="form-control" type="text" name="mvName" placeholder="Movie name...">
            <input class="form-control" type="text" name="mvDesc" placeholder="Description">
            <div>
                <label for="" class="mb-2 text-muted">When do you watch this movie...</label>
                <input class="form-control" type="datetime-local" name="schTime" placeholder="">
            </div>
            <div>
                <label for="" class="mb-2 text-muted">Choose a movie picture...</label>
                <input class="form-control" type="file" name="mvPic">
            </div>
            <input type="submit" class=" btn btn-primary" value="Add this movie" name="submit">
            <a href="../pages/dashboard.php" class="text-decoration-none text-center text-muted" id="return">Return to home page</a>
        </form>
    </div>

</body>

</html>