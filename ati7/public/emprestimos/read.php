<?php
require 'db.php';
$sql = "SELECT e.id_emprestimo, l.titulo, le.nome, e.data_emprestimo, e.data_devolucao
        FROM emprestimos e
        JOIN livros l ON e.id_livro=l.id_livro
        JOIN leitores le ON e.id_leitor=le.id_leitor
        ORDER BY e.data_emprestimo DESC";
$emps = $pdo->query($sql)->fetchAll();
?>
<h2>Empréstimos</h2>
<a href="create_emprestimo.php">+ Novo Empréstimo</a>
<hr>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Livro</th><th>Leitor</th><th>Data Empréstimo</th><th>Data Devolução</th><th>Ações</th></tr>
<?php foreach($emps as $e): ?>
<tr>
  <td><?= $e['id_emprestimo'] ?></td>
  <td><?= htmlspecialchars($e['titulo']) ?></td>
  <td><?= htmlspecialchars($e['nome']) ?></td>
  <td><?= $e['data_emprestimo'] ?></td>
  <td><?= $e['data_devolucao'] ?></td>
  <td>
    <a href="update_emprestimo.php?id=<?= $e['id_emprestimo'] ?>">Editar</a> |
    <a href="delete_emprestimo.php?id=<?= $e['id_emprestimo'] ?>" onclick="return confirm('Excluir empréstimo?')">Excluir</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
