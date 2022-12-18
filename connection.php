<?php

class ConnectionBD
{
  private $db_name = "jovem_db";
  private $db_host = "localhost";
  private $db_user = "root";
  private $db_pass = "";
  public function connect()
  {
    try {
      $connection = new PDO(
        "mysql:host=$this->db_host;dbname=$this->db_name",
        "$this->db_user",
        "$this->db_pass",
      );
    } catch (PDOException $e) {
      echo '<p>Falha ao conectar banco de dados.</p>';
      echo '<p>' . $e->getMessage() . '</p>';
    }

    return $connection;
  }
}
