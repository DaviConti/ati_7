<?php
require 'db.php';

$id = (int)($_GET['id'] ?? 0);
if (!$id) { die("ID inválido"); }

// Busca livro
$stmt = $pdo->prepare("SELECT * FROM livros WHERE id_livro = :id");
$stmt->execute([':id' => $id]);
$livro = $stmt->fetch();
if (!$livro) { die("Livro não encontrado"); }

// Busca autores para o select
$autores = $pdo->query("SELECT id_autor, nome FROM autores ORDER BY nome")->fetchAll();

// Atualiza se formulário enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE livros 
            SET titulo = :titulo, genero = :genero, ano_publicacao = :ano, id_autor = :id_autor
            WHERE id_livro = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':titulo'   => $_POST['titulo'] ?? '',
        ':genero'   => $_POST['genero'] ?? null,
        ':ano'      => $_POST['ano_publicacao'] ?: null,
        ':id_autor' => $_POST['id_autor'],
        ':id'       => $id,
    ]);
    header("Location: listar.php");
    exit;
}
?>
<h2>Editar Livro</h2>
<form method="post">
  <label>Título*: 
    <input name="titulo" required value="<?= htmlspecialchars($livro['titulo']) ?>">
  </label><br>
  <label>Gênero: 
    <input name="genero" value="<?= htmlspecialchars($livro['genero']) ?>">
  </label><br>
  <label>Ano de publicação: 
    <input type="number" name="ano_publicacao" value="<?= htmlspecialchars($livro['ano_publicacao']) ?>">
  </label><br>
  <label>Autor*:
    <select name="id_autor" required>
      <option value="">— selecione —</option>
      <?php foreach ($autores as $a): ?>
        <option value="<?= $a['id_autor'] ?>" 
          <?= $a['id_autor'] == $livro['id_autor'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($a['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label><br>
  <button type="submit">Salvar Alterações</button>
</form>
<a href="listar.php">Voltar</a>