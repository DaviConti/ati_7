<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql = "INSERT INTO leitores (nome, email, telefone) VALUES (:nome, :email, :tel)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':nome' => $_POST['nome'],
    ':email' => $_POST['email'],
    ':tel' => $_POST['telefone']
  ]);
  header("Location: read_leitores.php");
  exit;
}
?>
<h2>Cadastrar Leitor</h2>
<form method="post">
  <label>Nome*: <input name="nome" required></label><br>
  <label>Email: <input type="email" name="email"></label><br>
  <label>Telefone: <input name="telefone"></label><br>
  <button type="submit">Salvar</button>
</form>
<a href="read_leitores.php">Voltar</a>
