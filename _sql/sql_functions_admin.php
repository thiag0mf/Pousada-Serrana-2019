<?php


// =======================================
//               FUNÇÕES
// ======================================

//Retorna a palavra no plural, caso o valor seja maior ou igual a 2
function isPlural($palavra, $valor){
    $resultado = $valor >= 2?$palavra.'S' : $palavra;

    return $valor.' '.$resultado;
}

//Retorna os dados em um array associativo de uma row
function getValores($sql){
    require 'connect.php';

    $dados = mysqli_query($connect, $sql);
    return mysqli_fetch_assoc($dados);
}


//Retorna os dados em um array, uma propriedade de cada row
function getMultipleValues($sql){
    require 'connect.php';

    $dados = mysqli_query($connect, $sql);
    $array = array();

    while($resultado = mysqli_fetch_array($dados)){
        array_push($array, $resultado[0]);
    }

    return $array;
}

