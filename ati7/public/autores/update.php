<?php
require 'db.php';

$id = (int)($_GET['id'] ?? 0);
if (!$id) { die("ID inválido"); }

// Busca autor pelo ID
$stmt = $pdo->prepare("SELECT * FROM autores WHERE id_autor = :id");
$stmt->execute([':id' => $id]);
$autor = $stmt->fetch();

if (!$autor) {
    die("Autor não encontrado");
}

// Atualiza se formulário enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE autores 
            SET nome = :nome, nacionalidade = :nac, ano_nascimento = :ano
            WHERE id_autor = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $_POST['nome'] ?? '',
        ':nac'  => $_POST['nacionalidade'] ?? null,
        ':ano'  => $_POST['ano_nascimento'] ?: null,
        ':id'   => $id,
    ]);
    header("Location: listar.php");
    exit;
}
?>
<h2>Editar Autor</h2>
<form method="post">
  <label>Nome*: 
    <input name="nome" required value="<?= htmlspecialchars($autor['nome']) ?>">
  </label><br>
  <label>Nacionalidade: 
    <input name="nacionalidade" value="<?= htmlspecialchars($autor['nacionalidade']) ?>">
  </label><br>
  <label>Ano de nascimento: 
    <input type="number" name="ano_nascimento" value="<?= htmlspecialchars($autor['ano_nascimento']) ?>">
  </label><br>
  <button type="submit">Salvar Alterações</button>
</form>
<a href="listar.php">Voltar</a>