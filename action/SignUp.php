<?php

require_once "../data/Stagaire.php";

function isSame($original, $repeated)
{
    if ($original == $repeated) {
        return true;
    }
    return false;
}


try {
    if (!($_SERVER['REQUEST_METHOD'] == "POST")) {
        throw new Error('No Data Found');
    }

    $userNameStg = $_POST["userNameStg"];
    $passWordStg = $_POST["passWordStg"];
    $RpassWordStg = $_POST["RpassWordStg"];
    $nomStg = $_POST["nomStg"];
    $AgeStg = $_POST["AgeStg"];

    $userData = [$userNameStg, $passWordStg, $RpassWordStg, $nomStg, $AgeStg];

    if (in_array("", $userData)) {
        throw new Error("Please complete the form!");
    }

    if (!isSame($passWordStg, $RpassWordStg)) {
        throw new Error("Please Match your Passwords!");
    }

    $stg = new Stagaire($userNameStg, $nomStg, $passWordStg, $AgeStg);
    
} catch (Error $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
