<?php

include 'db.php';


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
                    <a href='update.php?id={$row['id_produto']}'>Utualizar</a>
                </td>
                <td>
                    <a href='delete.php?id={$row['id_produto']}'>Deletar</a>
                </td>
            </tr>
        ";
    }
    echo "</table>";
    echo "<a href='create.php'>Criar Registro</a>";
}else{
    echo "Nenhum produto registrado.";
    echo "<a href='create.php'>Criar Registro</a>";
}

$conn -> close();

?>