<?php

class Manager
{
  static protected $columns = [];

  static protected function dbConnect()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=p05_blog", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    return $conn;
  }
  static public function get_all($created_date)
  {
    $conn = self::dbConnect();
    $sql = "SELECT * FROM " . static::$table_name;
    $sql .= " ORDER BY " . $created_date . " DESC";
    $req = $conn->prepare($sql);
    $req->execute();
    $conn = null;
    return $req;
  }
  static public function get_by_id($id)
  {
    $conn = self::dbConnect();
    $sql = "SELECT * FROM " . static::$table_name;
    $sql .= " WHERE id= " . $id;
    $req = $conn->prepare($sql);
    $req->execute();
    $conn = null;
    return $req;
  }
  static protected function update($status, $id)
  {
    $db = self::dbConnect();
    $sql = "UPDATE " . static::$table_name;
    $sql .= " SET " . static::$fVariable . $status;
    $sql .= " WHERE id= " . $id;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $db = null;
  }
  static protected function delete($id)
  {
    $db = self::dbConnect();
    $sql = "DELETE FROM " . static::$table_name;
    $sql .= " WHERE id= " . $id;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $db = null;
  }
}
