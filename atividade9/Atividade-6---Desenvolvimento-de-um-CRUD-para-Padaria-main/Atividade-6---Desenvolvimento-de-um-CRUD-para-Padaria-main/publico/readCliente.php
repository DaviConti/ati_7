<?php

include '../privado/db.php';


$sql = "SELECT * FROM produto";

$result = $conn->query($sql);

if($result->num_rows > 0){

    echo "<table border = '1'>
        <tr>
            <th> Nome </th>
            <th> Preço </th>
            <th> Descrição </th>
            <th> Disponiveis </th>
            <th> Criador </th>
        </tr>
    ";

    while($row = $result->fetch_assoc()){

        echo "<tr>
                <td> {$row['nome']} </td>
                <td> {$row['preco']} </td>
                <td> {$row['descricao']} </td>
                <td> {$row['quantidade_estoque']} </td>
                <td> {$row['id_usuario']} </td>
                <td>
                    <a href='comprarProduto.php?id={$row['id_produto']}'>Comprar</a>
                </td>
            </tr>
        ";
    }
    echo "</table>";
}else{
    echo "Nenhum produto registrado.";
}

$conn -> close();

?>