<?php

class  Database 
{

    Private function connect()
    {
        $string = "mysqli:host=localhost;dbname=mvc_db";
        $con = new PDO($string, 'root', '');
        return $con;
    }


}