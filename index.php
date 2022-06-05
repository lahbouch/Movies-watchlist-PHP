<?php

session_start();
if (isset($_SESSION['userName'])) {
    header("Location: ./pages/dashboard.php");
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

        <div class="d-flex flex-column gap-3 w-50">
            <h2 class="text-center">Create you Watch list with us</h2>
            <a href="./pages/signIn.php" class="btn btn-secondary">Sign In</a>
            <a href="./pages/signUp.php" class="btn btn-primary">Sign Up</a>
        </div>
    </div>
</body>

</html>