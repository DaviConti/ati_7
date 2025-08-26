<?php
require 'db.php';
$id = (int)($_GET['id'] ?? 0);
try {
  $pdo->prepare("DELETE FROM leitores WHERE id_leitor=:id")->execute([':id'=>$id]);
  header("Location: read_leitores.php");
} catch (PDOException $e) {
  if ($e->getCode() === "23000") {
    die("Não é possível excluir: há empréstimos vinculados.<br><a href='read_leitores.php'>Voltar</a>");
  }
  die("Erro: ".$e->getMessage());
}
