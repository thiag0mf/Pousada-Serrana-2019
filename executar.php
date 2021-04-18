<?php

    require '_sql/connect.php';

        $result = getMultipleObjectsInArray("SELECT nome, email FROM `clientes` WHERE newsletter = 1");

        $result2 = getMultipleObjectsInArray("SELECT nome, email FROM `clientes_contato` WHERE newsletter = 1");
            
        $emails = array();
        
        //Organiza os emails contidos em result em um array

        foreach ($result as $key => $value) {
            array_push($emails, utf8_decode($value['nome']).' - '.$value['email']);
        }

        foreach ($result2 as $key => $value) {
            array_push($emails, utf8_decode($value['nome']).' - '.$value['email']);
        }

        $arrayEmails = array();

        foreach ($emails as $key => $value) {
            array_push($arrayEmails, $value);
        }

        echo '<br>';

        print_r($arrayEmails);



//Retorna os dados em um array, uma propriedade de cada row
function getMultipleObjectsInArray($sql){
    require '_sql/connect.php';

    $dados = mysqli_query($connect, $sql);
    $array = array();

    while($resultado = mysqli_fetch_assoc($dados)){
        array_push($array, $resultado);
    }

    // $resultado = mysqli_fetch_assoc($dados);

    return $array;
}


    