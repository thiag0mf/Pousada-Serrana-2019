<?php

require_once './connect.php';
require './require-functions.php';

//Pega a opção enviada pela requisição ajax
$option = $_POST['option'];

switch ($option) {
    case 'select':

        $sql = "SELECT * FROM reserva AS A LEFT JOIN clientes AS B ON a.cpf_cliente = b.cpf_cliente";
                                    
        $dados = mysqli_query($connect, $sql);
        
        $tamanhoString = 10;

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

            //Estado
            $estado = utf8_encode($resultado['estado']);

            $estado = substr($estado, strpos($estado, '(') + 1);
            $estado = substr($estado, 0, strpos($estado, ')'));

            $cpf = $resultado['cpf_cliente'];
            $cpf = quebraLinha($cpf, $tamanhoString);


            $telefone = $resultado['telefone'];
            $telefone = quebraLinha($telefone, $tamanhoString);


            $quarto = utf8_encode($resultado['quarto']);
            $checkIn = $resultado['checkIn'];
            $checkOut = $resultado['checkOut'];
            $pessoas = $resultado['pessoas'];

            $valor = $resultado['valor'];


            echo "<tr data-id-cliente=\"".$resultado['id_cliente']."\" data-id-reserva=\"".$resultado['id_reserva']."\">
            <td>$nome</td>
            <td>$cpf</td>
            <td>$telefone</td>
            <td>$email</td>
            <td>$cidade</td>
            <td>$estado</td>
            <td>$quarto</td>
            <td>$pessoas</td>
            <td>R$$valor,00</td>
            <td>$checkIn</td>
            <td>$checkOut</td>
            <td class=\"text-center border-left\">
                <button class=\"btn-editar btn btn-success\" data-toggle=\"modal\" data-target=\"#modalEdit\">Editar</button> 
                <span class=\"p-1\"></span> 
                <button  class=\"btn-excluir btn btn-outline-danger\">Excluir</button>
            </td>
        </tr>";
        }
    

        break;
    case 'openModal':
    
        $rowId = $_POST['idRowReserva'];
    
        $sql = "SELECT * FROM reserva AS A LEFT JOIN clientes AS B ON a.cpf_cliente = b.cpf_cliente WHERE id_reserva = '$rowId'";
    
        $dados = mysqli_query($connect, $sql);
    
        $resultado = mysqli_fetch_assoc($dados);

        $quarto = $resultado['quarto'];

        $valorQuarto = getValores("SELECT valor FROM quartos WHERE nomeQuarto = '$quarto'");

        $qtdDias = (strtotime($resultado['checkOut']) - strtotime($resultado['checkIn']))/86400;

        $valorReserva = $qtdDias * $valorQuarto['valor'];

        echo json_encode(array(
            'nome' => utf8_encode($resultado['nome']), 
            'quarto' => $resultado['quarto'], 
            'pessoas' => $resultado['pessoas'],
            'cpf' => $resultado['cpf_cliente'], 
            'checkIn' => $resultado['checkIn'], 
            'checkOut' => $resultado['checkOut'], 
            'email' => utf8_encode($resultado['email']), 
            'cidade' => utf8_encode($resultado['cidade']), 
            'estado' => utf8_encode($resultado['estado']), 
            'telefone' => $resultado['telefone'], 
            'newsletter' => $resultado['newsletter'],
            'valor' => $valorReserva
        ));

        break;

    case 'delete':
    
        $rowId = $_POST['idRowReserva'];

        $sql = "DELETE FROM reserva WHERE id_reserva = '$rowId'";

        if($dados = mysqli_query($connect, $sql)){
            echo 'Exclusão realizada com sucesso!';
        }
        else{
            echo 'Erro ao excluir!';
        }

        break;

    case 'update':

        //Validação dos dados do formulário
        
        require './validar-dados.php';

        require './validar-reserva.php';

        $rowIdReserva = $_POST['rowIdReserva'];
        $rowIdCliente = $_POST['idRowCliente'];

        $valorQuarto = getValores("SELECT valor FROM quartos WHERE nomeQuarto = '$quarto'");

        $qtdDias = (strtotime($checkOut) - strtotime($checkIn))/86400;

        $valorReserva = $qtdDias * $valorQuarto['valor'];

        $erroInsert = array();

        if($validaNome && $validaEmail && $validaTelefone && $reservaAutorizada && $validaCPF && $validaCidade){

            //Adicionar cliente
            
            $sql = "UPDATE clientes SET nome = '$nome', cpf_cliente = '$cpf', cidade = '$cidade', estado = '$estado', telefone = '$telefone', email = '$email', newsletter = '$concordou' WHERE id_cliente = '$rowIdCliente'";

            if(!mysqli_query($connect, $sql)){
                array_push($erroInsert, 'Erro ao cadastrar cliente!');
            }

            //Adicionar Reserva
            $sql = "UPDATE reserva SET quarto = '$quarto', pessoas = '$pessoas', cpf_cliente = '$cpf', valor = '$valorReserva', checkIn = '$checkIn', checkOut = '$checkOut' WHERE id_reserva = '$rowIdReserva'";

            if(!mysqli_query($connect, $sql)){
                array_push($erroInsert, 'Erro ao reservar!');
            }

            mysqli_query($connect, $sql);
        }


        //Envia para o ajax-index.js em formato JSON os dados da validação
        echo json_encode(array('erros' => $erroInsert, 'validaNome' => $validaNome, 'validaEmail' => $validaEmail, 'validaTelefone' => $validaTelefone, 'validaReserva' => $reservaAutorizada, 'validaCPF' => $validaCPF, 'validaCidade' => $validaCidade));

        //echo json_encode(array('erros' => $erroInsert));


        //echo json_encode(array('erros' => 'teste'));
            
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

    // $resultado = mysqli_fetch_assoc($dados);

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

//Função que verifica se é possível fazer reserva nas datas desejadas
function verificaReserva($a1, $a2, $b1, $b2){
    $erro = array();

    if(strtotime($a1) > strtotime($b1) && strtotime($a1) < strtotime($b2)) array_push($erro, false);
    if(strtotime($a2) <= strtotime($b2) && strtotime($a2) > strtotime($b1)) array_push($erro, false);
    if(strtotime($a1) < strtotime($b2) && strtotime($a2) >= strtotime($b2)) array_push($erro, false);

    return count($erro) == 0;
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