<?php
require 'db.php';
$id = (int)($_GET['id'] ?? 0);
if (!$id) { die('ID inválido'); }
$pdo->prepare("DELETE FROM livros WHERE id_livro = :id")->execute([':id'=>$id]);
header('Location: listar.php');