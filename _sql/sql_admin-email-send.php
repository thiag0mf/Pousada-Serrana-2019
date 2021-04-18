<?php 
 
require_once 'connect.php';
require_once './../_session/session_verify.php';

$erros = array();

$option = $_POST['option'];

switch ($option):
    //Retorna um array com todos os e-mails do banco de dados em formato JSON, para o input de autocomplete
    case 'getListaEmails':
        
        $result = getMultipleObjectsInArray("SELECT nome, email FROM `clientes`");

        $result2 = getMultipleObjectsInArray("SELECT nome, email FROM `clientes_contato`");
            
        $emails = array();
        
        //Organiza os emails contidos em result em um array

        foreach ($result as $key => $value) {
            array_push($emails, utf8_encode($value['nome']).' - '.utf8_encode($value['email']));
        }

        foreach ($result2 as $key => $value) {
            array_push($emails, utf8_encode($value['nome']).' - '.utf8_encode($value['email']));
        }

        echo json_encode($emails);

        break;

    //Envia a mensagem
    case 'setMensagem':

        $selectEmail = $_POST['selectEmail'];
        $dadosEmail = $_POST['dadosEmail'];

        //Faz a seleção de qual radio button usar
        if($selectEmail == 'todos'):

            $result = getMultipleValues("SELECT email FROM `clientes` WHERE newsletter = 1");

            $result2 = getMultipleValues("SELECT email FROM `clientes_contato` WHERE newsletter = 1");
                    
            $emails = array();

            foreach ($result as $key => $value) {
                array_push($emails, $value);
            }
    
            foreach ($result2 as $key => $value) {
                array_push($emails, $value);
            }

        else: 
            if($selectEmail == 'tipo'):
                
                switch (count($dadosEmail)) {
                    
                    case 2:
                        $result = getMultipleValues("SELECT email FROM `clientes` WHERE newsletter = 1");

                        $result2 = getMultipleValues("SELECT email FROM `clientes_contato` WHERE newsletter = 1");
                                
                        $emails = array();
            
                        foreach ($result as $key => $value) {
                            array_push($emails, $value);
                        }
                
                        foreach ($result2 as $key => $value) {
                            array_push($emails, $value);
                        }
                    
                        break;
                    
                    case 1:

                    $emails = array();
                    
                    if($dadosEmail[0] === 'reservaAtiva'){
                        
                        $result = getMultipleValues("SELECT email FROM reserva AS A LEFT JOIN clientes AS B ON a.cpf_cliente = b.cpf_cliente group by email
                        having Count(email)>1");
                        
                        foreach ($result as $key => $value) {
                                array_push($emails, $value);
                            }


                        }else if($dadosEmail[0] === 'semReserva'){
                            $result = getMultipleValues("SELECT email FROM clientes_contato WHERE newsletter = 1");

                            foreach ($result as $key => $value) {
                                array_push($emails, $value);
                            }
                        }
                        
                        break;
                    default:
                   
                        array_push($emails, 'sem escolha');
                        break;
                }
                
            else: 
                if($selectEmail == 'individual'):
                    //substr($email, strpos($email, ' - ') + 3); 

                    $emails = array(); 

                    foreach ($dadosEmail as $key => $value) {
                        array_push($emails, substr($value, strpos($value, ' - ') + 3));
                    }
                    
                endif;
            endif;
        endif;
        
        //Recebe as outras informações do form
        $assunto = $_POST['assunto'];
        $assuntoLength = strlen(str_replace(' ', '', $assunto));

        if($assuntoLength > 60 
        || $assuntoLength < 20){
            array_push($erros, 'Assunto inválido!');
        }

        $mensagem = $_POST['mensagem'];
        $mensagemLength = strlen(str_replace(' ', '', $mensagem));
        
        if($mensagemLength > 1000 
        || $mensagemLength < 30){
            array_push($erros, 'Mensagem inválida!');
        }
        
        //Especifica o tipo de documento enviar
        $headers  = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        if(count($erros) == 0){

            foreach ($emails as $key => $value) {
                
                // if(!mail($value, $assunto, $mensagem, $headers)){
                //     array_push($erros, 'Email não enviado!');
                // }
            }
        }
            
        echo json_encode(array('emails' => $emails, 'erros' => $erros));
            
        break;

    default:
            
        break;
endswitch;

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