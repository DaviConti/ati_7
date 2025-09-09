<?php


include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    

    $sql = " INSERT INTO produto (nome,descricao,preco,quantidade_estoque,id_usuario) VALUE ('$name','$descricao','$preco','$quantidade',1)";

    if ($conn->query($sql) === true) {
        echo "Novo produto registrado criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="../styles.css">

</head>

<body>

<div class="centralizador">

    
    <div class="centro">
    <h1>Adicionar o Produto</h1>
     <form method="POST" action="create.php">
    <div class="flex">
        <label for="name">Nome:</label>
        <input class="informacoesProduto" type="text" name="name" required>

        <label for="preco">Preço:</label>
        <input class="informacoesProduto"  type="preco" name="preco" required>

        <label for="quantidade">Quantidade:</label>
        <input class="informacoesProduto"  type="quantidade" name="quantidade">

        <label for="descricao">Descrição:</label>
        <input class="informacoesProduto"  type="descricao" name="descricao">
    </div>
        <input id="botaoAdd" type="submit" value="Adicionar">
        <div>
            <a href="read.php">Ver Registros</a>
        </div>
        
</div>

    </form>

</div>
    
</body>


</html>