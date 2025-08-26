<?php
require 'db.php';

$id = (int)($_GET['id'] ?? 0);
if (!$id) { die('ID inválido'); }

try {
  $stmt = $pdo->prepare("DELETE FROM autores WHERE id_autor = :id");
  $stmt->execute([':id' => $id]);
  header('Location: listar.php');
} catch (PDOException $e) {
  if ($e->getCode() === '23000') {
    die("Não é possível excluir: existem livros vinculados a este autor. "
      . "<a href='listar.php'>Voltar</a>");
  }
  die('Erro: ' . $e->getMessage());
}
