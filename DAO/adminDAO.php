<?php

class AdminDAO
{
  //A função construtora é usada toda a vez que a classe for instanciada. Os parâmetros correspondem aos atribuidos à função na instância.
  public function __construct()
  {
    include 'connection.php';
    $conn = new ConnectionBD();
    $this->conn = $conn->connect();
  }

  public function select()
  {
    $sql = "SELECT * FROM admin";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function insert()
  {
  }
  public function update()
  {
  }
}
