<?php
try {

    if (!($_SERVER['REQUEST_METHOD'] == "POST")) {
        throw new Error('No Data Found');
    }

    $username = $_POST["userNameStg"];
    $password = $_POST["passWordStg"];

    if (empty($username) || empty($password)) {
        throw new Error("Please fill all the infomation");
    }

    $accounts = fopen("../data/accounts.txt", "r");
    $res = "None";
    while (!feof($accounts)) {
        $account = fgets($accounts);
        echo "<pre>";
        $accountInfo = explode(";", $account);

        if (($accountInfo[0] == strtolower($username)) && ($accountInfo[1] == $password)) {
            $res = 1;
            session_start();
            $_SESSION['name'] = $accountInfo[2];
        }
    }
    if ($res != "None") {
        $_SESSION['userName'] = $username;

        $_SESSION['userData'] = "../users/{$_SESSION['userName']}.txt";

        header("Location: ../pages/dashboard.php");
    } else {
        throw new Error("one of your inputs is incorrect<br>please check them ...");
    }
} catch (Error $e) {
    echo $e->getMessage();
}
