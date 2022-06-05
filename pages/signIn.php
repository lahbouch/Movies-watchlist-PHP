<?php
session_start();
if (isset($_SESSION['userName'])) {
    header("Location: ./dashboard.php");
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
        <form method="POST" action="../action/SignIn.php" class="d-flex flex-column gap-3 w-50">
            <h2 class="text-center">Log In</h2>
            <input type="text" name="userNameStg" id="userNameStg" class="form-control" placeholder="Username">
            <input type="password" name="passWordStg" id="passWordStg" class="form-control" placeholder="Password">
            <input type="submit" class="btn btn-primary" value="Sign In">
            <a href="./signUp.php" class="btn btn-secondary">Sign Up</a>
        </form>
    </div>
</body>

</html>