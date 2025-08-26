<?php
require 'db.php';

// Busca autores para o <select>
$autores = $pdo->query("SELECT id_autor, nome FROM autores ORDER BY nome")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql = "INSERT INTO livros (titulo, genero, ano_publicacao, id_autor)
          VALUES (:titulo, :genero, :ano, :id_autor)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':titulo'   => $_POST['titulo'] ?? '',
    ':genero'   => $_POST['genero'] ?? null,
    ':ano'      => $_POST['ano_publicacao'] ?: null,
    ':id_autor' => $_POST['id_autor'],
  ]);
  header('Location: listar.php');
  exit;
}
?>
<form method="post">
  <label>Título*: <input name="titulo" required></label><br>
  <label>Gênero: <input name="genero"></label><br>
  <label>Ano de publicação: <input type="number" name="ano_publicacao"></label><br>
  <label>Autor*:
    <select name="id_autor" required>
      <option value="">— selecione —</option>
      <?php foreach ($autores as $a): ?>
        <option value="<?= htmlspecialchars($a['id_autor']) ?>">
          <?= htmlspecialchars($a['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label><br>
  <button type="submit">Salvar Livro</button>
</form>