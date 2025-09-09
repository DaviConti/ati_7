<?php
    include '../privado/db.php';

    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = " INSERT INTO pedidos (id_cliente,id_pruduto,quantidade) VALUE (1,'$id',1)";

    if ($conn->query($sql) === true) {
        echo "Novo pedido feito com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>