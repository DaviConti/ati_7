<?php
require 'db.php';

$sql = "SELECT * FROM autores ORDER BY nome";
$autores = $pdo->query($sql)->fetchAll();
?>
<h2>Lista de Autores</h2>
<a href="adicionar_autor.php">+ Novo Autor</a>
<hr>
<table border="1" cellpadding="5">
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Nacionalidade</th>
    <th>Ano de Nascimento</th>
    <th>Ações</th>
  </tr>
  <?php foreach ($autores as $a): ?>
  <tr>
    <td><?= $a['id_autor'] ?></td>
    <td><?= htmlspecialchars($a['nome']) ?></td>
    <td><?= htmlspecialchars($a['nacionalidade']) ?></td>
    <td><?= htmlspecialchars($a['ano_nascimento']) ?></td>
    <td>
      <a href="editar_autor.php?id=<?= $a['id_autor'] ?>">Editar</a> | 
      <a href="remover_autor.php?id=<?= $a['id_autor'] ?>" onclick="return confirm('Excluir autor?')">Excluir</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<a href="listar.php">Ver autores e livros</a>
