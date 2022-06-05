<?php

class Stagaire
{
    private $userName;
    public $name;
    private $password;
    public $age;

    function __construct($userName, $name, $password, $age)
    {
        $this->userName = $this->setUserName($userName);
        $this->name = $name;
        $this->password = $this->setPassword($password);
        $this->age = $age;
        $this->submitUser();
    }

    public function setUserName($userName)
    {
        $accounts = fopen("../data/accounts.txt", "r");
        while (!feof($accounts)) {
            $account = fgets($accounts);
            $accountInfo = explode(";", $account);

            if ($userName == strtolower($accountInfo[0])) {
                throw new Exception("username already exists! <br> please choose another username ...");
            }
            return $userName;
        }
    }

    public function setPassword($password)
    {

        if (strlen($password) < 6) {
            throw new Error("The password must be countains 6 or more caractere!");
        }
        return $password;
    }

    function __toString()
    {
        return $this->userName . ";" . $this->password . ";" . $this->name . ";" . $this->age . "\n";
    }

    protected function submitUser()
    {

        if (!file_exists($this->userName)) {
            if (!fopen("../users/$this->userName.txt", "a")) {
                throw new Error("The account is not created try again ...");
            };
            if (!mkdir("../data/img/$this->userName")) {
                throw new Error("The account is not created try again ...");
            };
            

            file_put_contents("../data/accounts.txt", $this, FILE_APPEND);
            header("Location: ../pages/signUp.php?msg=1");
        }
    }
}
