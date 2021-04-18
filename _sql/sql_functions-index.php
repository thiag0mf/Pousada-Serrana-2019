<?php

require_once './connect.php';
require './require-functions.php';

//Pega a opção enviada pela requisição ajax
$option = $_POST['option'];
$reservaAutorizada = false;


switch ($option) {
    case 'verificarQuarto':

        $maxPessoasStandart = getMultipleValues("SELECT numeroPessoas FROM quartos WHERE nomeQuarto = 'Standart'");
        $maxPessoasPremium = getMultipleValues("SELECT numeroPessoas FROM quartos WHERE nomeQuarto = 'Premium'");

        echo json_encode(array('maxPessoasStandart' => $maxPessoasStandart, 'maxPessoasPremium' => $maxPessoasPremium));

        break;


    case 'contato':

        require './validar-dados.php';

        $erroInsert = array();

        if($validaNome && $validaEmail && $validaCidade && $validaMensagem){
             //Adicionar cliente

             $sql = "SELECT email FROM clientes_contato WHERE email = '$email'";

             $dados = mysqli_fetch_array(mysqli_query($connect, $sql));
 
             if(count($dados) != 0){
                 $sql = "DELETE FROM clientes_contato WHERE email = '$email'";
 
                 if(!mysqli_query($connect, $sql)){
                     array_push($erroInsert, 'Erro ao excluir cliente já cadastrado!');
                 }
             }
             
             $sql = "INSERT INTO clientes_contato(id_cliente, nome, email, cidade, estado, newsletter) VALUES (NULL,'$nome','$email','$cidade','$estado','$concordou')";
 
             if(!mysqli_query($connect, $sql)){
                 array_push($erroInsert, 'Erro ao cadastrar cliente!');
             }
 
             //Adicionar Reserva
             $sql = "INSERT INTO mensagem_contato(id_mensagem, email, assunto, mensagem) VALUES (NULL, '$email', '$assunto', '$mensagem')";
 
             if(!mysqli_query($connect, $sql)){
                 array_push($erroInsert, 'Erro ao salvar mensagem!');
             }
        }

        //Envia para o ajax-index.js em formato JSON os dados da validação
        echo json_encode(array('erros' => $erroInsert, 'validaNome' => $validaNome, 'validaEmail' => $validaEmail, 'validaCidade' => $validaCidade, 'validaMensagem' => $validaMensagem));

        break;

    case 'add':

    
    //Validação dos dados do formulário
    
    require './validar-dados.php';
    
    require './validar-reserva.php';
    
        $validarTipoQuarto = false;

        $maxPessoas = getMultipleValues("SELECT numeroPessoas FROM quartos WHERE nomeQuarto = '$quarto'");

        if($pessoas <= $maxPessoas[0]){
            $validarTipoQuarto = true;
        }
        $erroInsert = array();
        //$erroInsert;

        if($validaNome && $validaEmail && $validaTelefone && $reservaAutorizada && $validaCPF && $validaCidade && $validarTipoQuarto){

            //Adicionar cliente

            $sql = "SELECT cpf_cliente FROM clientes WHERE cpf_cliente = '$cpf'";

            $dados = mysqli_fetch_array(mysqli_query($connect, $sql));

            if(count($dados) != 0){
                $sql = "DELETE FROM `clientes` WHERE cpf_cliente = '$cpf'";

                if(!mysqli_query($connect, $sql)){
                    array_push($erroInsert, 'Erro ao excluir cliente já cadastrado!');
                }
            }
            
            $sql = "INSERT INTO clientes(id_cliente, nome, cpf_cliente, cidade, estado, telefone, email, newsletter) VALUES (NULL, '$nome','$cpf','$cidade','$estado','$telefone','$email','$concordou')";

            if(!mysqli_query($connect, $sql)){
                array_push($erroInsert, 'Erro ao cadastrar cliente!');
            }

            //Adicionar Reserva
            $sql = "INSERT INTO reserva(id_reserva, quarto, pessoas, cpf_cliente, valor, checkIn, checkOut) VALUES (NULL,'$quarto','$pessoas','$cpf', '$valorReserva', '$checkIn','$checkOut')";

            if(!mysqli_query($connect, $sql)){
                array_push($erroInsert, 'Erro ao reservar!');
            }

            //Adicionar ao histórico
            $sql = "INSERT INTO historico(id_reserva, quarto, cpf_cliente, valor, checkIn, checkOut) VALUES (NULL,'$quarto','$cpf', '$valorReserva', '$checkIn','$checkOut')";

            mysqli_query($connect, $sql);
        }


        //Envia para o ajax-index.js em formato JSON os dados da validação
        echo json_encode(array('erros' => $erroInsert, 'validaNome' => $validaNome, 'validaEmail' => $validaEmail, 'validaTelefone' => $validaTelefone, 'validaReserva' => $reservaAutorizada, 'validaCPF' => $validaCPF, 'validaCidade' => $validaCidade, 'validarTipoQuarto' => $validarTipoQuarto));
            
        break;

    case 'verificarCheckIn':
        
        require './validar-reserva.php';

        echo json_encode(array('reservaAutorizada' => $reservaAutorizada, 'valorReserva' => $valorReserva));

        break;

    case 'verificarCheckInUpdate':
        
        require './validar-reserva-update.php';

        echo json_encode(array('reservaAutorizada' => $reservaAutorizada, 'valorReserva' => $valorReserva));

        break;

    case 'verificarCpf':
        $cpf = $_POST['cpf'];

        echo json_encode(array('cpfValido' => validaCPF($cpf)));

        break;

    default:
        echo json_encode(array('erro' => 'Erro ao escolher operação'));
        break;
}

//Fecha a conexão
mysqli_close($connect);


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

//Função que verifica se é possível fazer reserva nas datas desejadas
function verificaReserva($a1, $a2, $b1, $b2){
    $erro = array();

    if(strtotime($a1) > strtotime($b1) && strtotime($a1) < strtotime($b2)) array_push($erro, false);
    if(strtotime($a2) <= strtotime($b2) && strtotime($a2) > strtotime($b1)) array_push($erro, false);
    if(strtotime($a1) < strtotime($b2) && strtotime($a2) >= strtotime($b2)) array_push($erro, false);

    return count($erro) == 0;
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
