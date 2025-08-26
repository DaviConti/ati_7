<?php
require 'db.php';
$id=(int)($_GET['id'] ?? 0);
$pdo->prepare("DELETE FROM emprestimos WHERE id_emprestimo=:id")->execute([':id'=>$id]);
header("Location: read_emprestimos.php");
