<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql = "INSERT INTO autores (nome, nacionalidade, ano_nascimento)
          VALUES (:nome, :nac, :ano)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':nome' => $_POST['nome'] ?? '',
    ':nac'  => $_POST['nacionalidade'] ?? null,
    ':ano'  => $_POST['ano_nascimento'] ?: null,
  ]);
  header('Location: listar.php');
  exit;
}
?>
<form method="post">
  <label>Nome*: <input name="nome" required></label><br>
  <label>Nacionalidade: <input name="nacionalidade"></label><br>
  <label>Ano de nascimento: <input type="number" name="ano_nascimento"></label><br>
  <button type="submit">Salvar Autor</button>
</form>
