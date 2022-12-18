<?php

abstract class Model
{
  protected $conn;
  public function __construct()
  {
    include_once 'connection.php';
    $this->conn = new ConnectionBD();
    $this->conn = $this->conn->connect();
  }
}
