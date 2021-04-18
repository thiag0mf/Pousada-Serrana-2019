<?php

require_once './connect.php';
require './require-functions.php';

//Pega a opção enviada pela requisição ajax
$option = $_POST['option'];

switch ($option) {
    case 'select':

        $sql = "SELECT * FROM mensagem_contato AS A LEFT JOIN clientes_contato AS B ON a.email = b.email";
                                        
        $dados = mysqli_query($connect, $sql);
        
        $tamanhoString = 14;
        $tamanhoStringTexto = 60;

        while($resultado = mysqli_fetch_assoc($dados)){
            
            //Nome
            $nome = utf8_encode($resultado['nome']);

            $nome = quebraLinha($nome, $tamanhoString);
            
            //Cidade
            $cidade = utf8_encode($resultado['cidade']);

            $cidade = quebraLinha($cidade, $tamanhoString);

            //Email
            $email = utf8_encode($resultado['email']);

            $email = quebraLinha($email, $tamanhoString);

            //Email
            $assunto = utf8_encode($resultado['assunto']);

            $assunto = quebraLinha($assunto, $tamanhoString);

            //Mensagem
            $mensagem = utf8_encode($resultado['mensagem']);

            $mensagem = quebraLinha($mensagem, $tamanhoStringTexto);

            //Estado
            $estado = utf8_encode($resultado['estado']);

            $estado = substr($estado, strpos($estado, '(') + 1);
            $estado = substr($estado, 0, strpos($estado, ')'));

            echo "<tr data-id-mensagem=\"".$resultado['id_mensagem']."\">
                <td>$nome</td>
                <td>$email</td>
                <td>$cidade</td>
                <td>$estado</td>
                <td>$assunto</td>
                <td>$mensagem</td>
                <td class=\"text-center border-left\">
                    <button class=\"btn-editar btn btn-success\" data-toggle=\"modal\" data-target=\"#modalEdit\">Email</button> 
                    <span class=\"p-1\"></span> 
                    <button  class=\"btn-excluir btn btn-outline-danger\">Excluir</button>
                </td>
            </tr>";
        }

        break;

    case 'delete':

        $rowId = $_POST['idRowMensagem'];

        $sql = "DELETE FROM mensagem_contato WHERE id_mensagem = '$rowId'";

        if($dados = mysqli_query($connect, $sql)){
            echo 'Exclusão realizada com sucesso!';
        }
        else{
            echo 'Erro ao excluir!';
        }

        break;

    case 'sendEmail':
        
        require 'validar-dados.php';

        $rowId = $_POST['idRowMensagem'];

        $erros = array();
        array_push($erros, false);

        if($validaMensagem && $validaAssunto){

            $erros = array();

            $email = getValores("SELECT email FROM mensagem_contato WHERE id_mensagem = '$rowId'");

            $email = $email['email'];

            //Especifica o tipo de documento enviar
            $headers  = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            //Envia email, não funciona em servidor local!!!
            // if(!mail($email, $assunto, $mensagem, $headers)){
            //     array_push($erros, 'Erro ao enviar email!');
            // }

        }

        echo json_encode(array('erros' => $erros, 'validaMensagem' => $validaMensagem, 'validaAssunto' => $validaAssunto));

        break;


    default:
        echo 'Opção inválida!';
}

//Retorna os dados em um array associativo de uma row
function getValores($sql){
    require 'connect.php';

    $dados = mysqli_query($connect, $sql);
    return mysqli_fetch_assoc($dados);
}

//Retorna os dados em um array, uma propriedade de cada row
function getMultipleObjectsInArray($sql){
    require 'connect.php';

    $dados = mysqli_query($connect, $sql);
    $array = array();

    while($resultado = mysqli_fetch_assoc($dados)){
    array_push($array, $resultado);
    }

    return $array;
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

//Coloca <br> a cada $maxLen caracteres na string $str
function quebraLinha($str, $maxLen){
    if(strlen($str) > $maxLen){
        $strIni = substr($str, 0, $maxLen);
        $strFin =  substr($str, $maxLen);

        if(strlen($strFin) > $maxLen) $strFin = quebraLinha($strFin, $maxLen);

        return $strIni .'<br>'. $strFin;
    }else{
        return $str;
    }
}