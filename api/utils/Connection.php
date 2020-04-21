<?php
class Connection {
  private $host='localhost';
  private $username="admin";
  private $password="admin";
  private $database="";
  private $connection;

  function __construct($database) {
    $this->database = $database;
  }

  function connect() {
    return $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
  }

  function select($query) {
    $result = mysqli_query($this->connection, $query);
    if ($result) {
      $data = array("rows" => mysqli_num_rows($result));
      $data["data"] = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $data;
    }
    return false;
  }

  function insert($query) {
    mysqli_query($this->connection, $query);
  }

  function close() {
    mysqli_close($this->connection);
  }
}
?>