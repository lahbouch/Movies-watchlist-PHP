<?php

class Movie
{
    function __construct($name, $desc, $time, $img)
    {
        $this->name = $name;
        $this->desc = $desc;
        $this->time = $time;
        $this->img = $img;
        $this->file = fopen(dirname(__FILE__, 2) . "\\users\\" . $_SESSION['userName'] . ".txt", "a");
        $this->addToData();
    }

    function __toString()
    {
        return "$this->name;$this->desc;$this->time;{$this->img['name']}\n";
    }

    function addToData()
    {
        //add img to img folder
        move_uploaded_file($this->img["tmp_name"], dirname(__FILE__, 2) . "\\data\\img\\" . $_SESSION['userName'] . "\\" . $this->img['name']);
        //add movie details to user file
        fwrite($this->file, $this);
        
    }
}
