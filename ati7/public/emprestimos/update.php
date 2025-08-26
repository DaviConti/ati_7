<?php
require 'db.php';
$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM emprestimos WHERE id_emprestimo=:id");
$stmt->execute([':id'=>$id]);
$emp = $stmt->fetch();
if(!$emp) die("Empréstimo não encontrado");

$livros = $pdo->query("SELECT id_livro, titulo FROM livros ORDER BY titulo")->fetchAll();
$leitores = $pdo->query("SELECT id_leitor, nome FROM leitores ORDER BY nome")->fetchAll();

if ($_SERVER['REQUEST_METHOD']==='POST') {
  $sql="UPDATE emprestimos SET id_livro=:livro, id_leitor=:leitor,
        data_emprestimo=:data_emp, data_devolucao=:data_dev WHERE id_emprestimo=:id";
  $stmt=$pdo->prepare($sql);
  $stmt->execute([
    ':livro'=>$_POST['id_livro'], ':leitor'=>$_POST['id_leitor'],
    ':data_emp'=>$_POST['data_emprestimo'], ':data_dev'=>$_POST['data_devolucao'] ?: null,
    ':id'=>$id
  ]);
  header("Location: read_emprestimos.php");
  exit;
}
?>
<h2>Editar Empréstimo</h2>
<form method="post">
  <label>Livro:
    <select name="id_livro" required>
      <?php foreach($livros as $l): ?>
        <option value="<?= $l['id_livro'] ?>" <?= $l['id_livro']==$emp['id_livro']?'selected':'' ?>>
          <?= htmlspecialchars($l['titulo']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label><br>
  <label>Leitor:
    <select name="id_leitor" required>
      <?php foreach($leitores as $lt): ?>
        <option value="<?= $lt['id_leitor'] ?>" <?= $lt['id_leitor']==$emp['id_leitor']?'selected':'' ?>>
          <?= htmlspecialchars($lt['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label><br>
  <label>Data Empréstimo: <input type="date" name="data_emprestimo" value="<?= $emp['data_emprestimo'] ?>"></label><br>
  <label>Data Devolução: <input type="date" name="data_devolucao" value="<?= $emp['data_devolucao'] ?>"></label><br>
  <button type="submit">Salvar</button>
</form>
<a href="read_emprestimos.php">Voltar</a>
