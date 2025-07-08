<?php

$mensagem = 'ola, mundo!';

echo $mensagem;

echo '<h2> ola mundo!</h2>';

$primeiro_nome = 'Davi o Grande';
$idade = 19;
$gosta_de_bolo = true;

$resultado_ano = 2025 - $idade;
echo $resultado_ano;
echo '<br>';

$num = 37.5;
echo $num;
echo '<br>';

$num2 = (int) $num;
echo '<br>';
echo $num2;

$nota = 8;

if($nota >= 7){
    echo '<p>Passou na prova</p>';
}else if ($nota == 10){
    echo '<p>como fez isso</p>';
}else{
    echo '<p>não passol na prova</p>';
};

for($i = 0; $i <=5; $i++){

    echo '<p> contagem: '. $i .'</p>';

    echo "<p> contagem: $i </p>";

};

$frutas = array('Laranja','Banana','Bergamota','tomate');

echo $frutas[1];

function saudacau($nome){
    return "ola $nome";
};

echo saudacau('Davi o grande')

?>