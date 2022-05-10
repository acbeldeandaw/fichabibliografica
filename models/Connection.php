<?php

class Connection
{
    public static function connect(): mysqli
    {
        $conn = new mysqli('localhost', 'root', '', 'bibliograpp');
        if ($conn->connect_error) {
            die("Error connecting with MySQL: " . $conn->connect_error);
        }
        return $conn;
    }
}