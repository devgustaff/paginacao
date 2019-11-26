<?php
class Conexao {
  private $dsn = "mysql:host=localhost;dbname=paginacao";
  private $dbuser = "root";
  private $dbpass = "";

  protected $pdo = NULL;

  public function __construct() {
    try {
      $this->pdo = new PDO($this->dsn, $this->dbuser, $this->dbpass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Erro na conexão.: " . $e->getMessage());
    }
  }
}