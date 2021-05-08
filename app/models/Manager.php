<?php

class Manager
{
    protected function dbConnect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        
          $db = new PDO("mysql:host=$servername;dbname=P05_blog", $username, $password);
          // set the PDO error mode to exception
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // echo "Connected successfully";
          return $db;
        } 
    }
