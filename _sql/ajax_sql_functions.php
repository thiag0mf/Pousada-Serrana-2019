<?php

$option = $_POST['option'];

switch ($option) {
    case 'getBGImages':
            echo json_encode(getMultipleValues("SELECT src FROM bgimagens"));
        break;
    
    case 'getIcons':
            echo json_encode(getMultipleValues("SELECT src FROM icons"));
        break;

    default:
        echo 'Nenhuma opção foi selecionada!';
        break;
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