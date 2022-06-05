<?php
session_start();
if (isset($_SESSION['userName'])) {
    header("Location: ./dashboard.php");
}

if (isset($_GET["msg"])) {
    switch ($_GET["msg"]) {
        case "1":
            echo "<p class='lead text-center pt-4' >You have created your account successfully</p>";
            break;
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
    <title>Document</title>
</head>

<body>
    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center ">
        <form method="POST" action="../action/SignUp.php" class="d-flex flex-column gap-3 w-50">
            <h2 class="text-center">Sign Up</h2>
            <input type="text" name="userNameStg" id="userNameStg" class="form-control" placeholder="Username">
            <input type="password" name="passWordStg" id="passWordStg" class="form-control" placeholder="Password">
            <input type="password" name="RpassWordStg" id="RpassWordStg" class="form-control" placeholder="Confirm password">
            <input type="text" name="nomStg" id="nomStg" class="form-control" placeholder="Nom">
            <input type="number" name="AgeStg" id="AgeStg" class="form-control" placeholder="Age">
            <input type="submit" class="btn btn-primary" value="Sign Up">
            <a href="./signIn.php" class="btn btn-secondary">Sign In</a>
        </form>
    </div>
</body>

</html>