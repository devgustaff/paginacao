<?php
require_once "Conexao.class.php";

class Usuarios extends Conexao {

  private $total;
  private $quantidade;

  public function lista($limite) {
    $sql = "SELECT * FROM usuarios LIMIT $limite, {$this->getQuantidadePorPag()}";
    $sql = $this->pdo->query($sql);

    if ($sql->rowCount() > 0) {
      return $sql->fetchAll();
    }
  } 

  public function quantidadeRegitros() {
    $sql = "SELECT COUNT(*) as c FROM usuarios";
    $sql = $this->pdo->query($sql);

    if ($sql->rowCount() > 0) {
      $row = $sql->fetch();
      $this->total = $row["c"] / $this->getQuantidadePorPag();
    }

    return $this->total;
  }

  public function setQuantidadePorPag($quantidade) {
    $this->quantidade = $quantidade;
  }

  public function getQuantidadePorPag() {
    return $this->quantidade;
  }
}