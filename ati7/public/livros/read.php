<?php
require 'db.php';

$sql = "SELECT l.id_livro, l.titulo, l.genero, l.ano_publicacao, 
               a.nome AS autor
        FROM livros l
        JOIN autores a ON l.id_autor = a.id_autor
        ORDER BY l.titulo";
$livros = $pdo->query($sql)->fetchAll();
?>
<h2>Lista de Livros</h2>
<a href="adicionar_livro.php">+ Novo Livro</a>
<hr>
<table border="1" cellpadding="5">
  <tr>
    <th>ID</th>
    <th>Título</th>
    <th>Gênero</th>
    <th>Ano de Publicação</th>
    <th>Autor</th>
    <th>Ações</th>
  </tr>
  <?php foreach ($livros as $l): ?>
  <tr>
    <td><?= $l['id_livro'] ?></td>
    <td><?= htmlspecialchars($l['titulo']) ?></td>
    <td><?= htmlspecialchars($l['genero']) ?></td>
    <td><?= htmlspecialchars($l['ano_publicacao']) ?></td>
    <td><?= htmlspecialchars($l['autor']) ?></td>
    <td>
      <a href="editar_livro.php?id=<?= $l['id_livro'] ?>">Editar</a> | 
      <a href="remover_livro.php?id=<?= $l['id_livro'] ?>" onclick="return confirm('Excluir livro?')">Excluir</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<a href="listar.php">Ver autores e seus livros</a>
