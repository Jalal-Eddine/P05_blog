<?php

class Manager
{
  static protected $table_name = "";
  static protected $columns = [];

  static protected function dbConnect()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=P05_blog", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    return $conn;
  }
  static public function get_all() {
    $conn = self::dbConnect();
    $sql = "SELECT * FROM " . static::$table_name ;
    $req = $conn->prepare($sql);
    $req->execute();
    $conn= null;
    return $req;
  }
  static public function get_by_id($id){
    $conn = self::dbConnect();
    $sql = "SELECT * FROM " . static::$table_name;
    $sql .= " WHERE id= " . $id;
    $req = $conn->prepare($sql);
    $req->execute();
    $conn= null;
    return $req;
  }
}
