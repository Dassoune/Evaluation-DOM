<?php

function connectDb()
{
    $host = "dbPOO";
    $user = "dassoune";
    $pass = "noemie0205";
    $dbname = "PokeBase";
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
