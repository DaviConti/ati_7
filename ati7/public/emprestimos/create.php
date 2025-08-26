<?php
require 'db.php';
$livros = $pdo->query("SELECT id_livro, titulo FROM livros ORDER BY titulo")->fetchAll();
$leitores = $pdo->query("SELECT id_leitor, nome FROM leitores ORDER BY nome")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql = "INSERT INTO emprestimos (id_livro, id_leitor, data_emprestimo, data_devolucao)
          VALUES (:livro, :leitor, :data_emp, :data_dev)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':livro'=>$_POST['id_livro'],
    ':leitor'=>$_POST['id_leitor'],
    ':data_emp'=>$_POST['data_emprestimo'],
    ':data_dev'=>$_POST['data_devolucao'] ?: null
  ]);
  header("Location: read_emprestimos.php");
  exit;
}
?>
<h2>Novo Empréstimo</h2>
<form method="post">
  <label>Livro:
    <select name="id_livro" required>
      <?php foreach($livros as $l): ?>
        <option value="<?= $l['id_livro'] ?>"><?= htmlspecialchars($l['titulo']) ?></option>
      <?php endforeach; ?>
    </select>
  </label><br>
  <label>Leitor:
    <select name="id_leitor" required>
      <?php foreach($leitores as $lt): ?>
        <option value="<?= $lt['id_leitor'] ?>"><?= htmlspecialchars($lt['nome']) ?></option>
      <?php endforeach; ?>
    </select>
  </label><br>
  <label>Data Empréstimo: <input type="date" name="data_emprestimo" required></label><br>
  <label>Data Devolução: <input type="date" name="data_devolucao"></label><br>
  <button type="submit">Salvar</button>
</form>
<a href="read_emprestimos.php">Voltar</a>
