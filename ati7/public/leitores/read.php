<?php
require 'db.php';
$leitores = $pdo->query("SELECT * FROM leitores ORDER BY nome")->fetchAll();
?>
<h2>Leitores</h2>
<a href="create_leitor.php">+ Novo Leitor</a>
<hr>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>
<?php foreach ($leitores as $l): ?>
<tr>
  <td><?= $l['id_leitor'] ?></td>
  <td><?= htmlspecialchars($l['nome']) ?></td>
  <td><?= htmlspecialchars($l['email']) ?></td>
  <td><?= htmlspecialchars($l['telefone']) ?></td>
  <td>
    <a href="update_leitor.php?id=<?= $l['id_leitor'] ?>">Editar</a> |
    <a href="delete_leitor.php?id=<?= $l['id_leitor'] ?>" onclick="return confirm('Excluir leitor?')">Excluir</a>
  </td>
</tr>
<?php endforeach; ?>
</table>