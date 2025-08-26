<?php
require 'db.php';
$id = (int)($_GET['id'] ?? 0);
$leitor = $pdo->prepare("SELECT * FROM leitores WHERE id_leitor = :id");
$leitor->execute([':id'=>$id]);
$leitor = $leitor->fetch();

if (!$leitor) die("Leitor não encontrado");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql = "UPDATE leitores SET nome=:nome, email=:email, telefone=:tel WHERE id_leitor=:id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':nome'=>$_POST['nome'], ':email'=>$_POST['email'], ':tel'=>$_POST['telefone'], ':id'=>$id
  ]);
  header("Location: read_leitores.php");
  exit;
}
?>
<h2>Editar Leitor</h2>
<form method="post">
  <label>Nome*: <input name="nome" required value="<?= htmlspecialchars($leitor['nome']) ?>"></label><br>
  <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($leitor['email']) ?>"></label><br>
  <label>Telefone: <input name="telefone" value="<?= htmlspecialchars($leitor['telefone']) ?>"></label><br>
  <button type="submit">Salvar</button>
</form>
<a href="read_leitores.php">Voltar</a>
