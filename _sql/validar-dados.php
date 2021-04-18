<?php

//Variáveis para validação
$validaNome = false;
$validaEmail = false;
$validaTelefone = false;
$validaCPF = false;
$validaCidade = false;
$validaMensagem = false;
$validaAssunto = false;

//Valores dos campos de input
if(isset($_POST['estado'])) $estado = utf8_decode($_POST['estado']);
if(isset($_POST['pessoas'])) $pessoas = $_POST['pessoas'];
if(isset($_POST['concordou'])) $concordou = $_POST['concordou'];


if(isset($_POST['nome'])) {
	$nome = utf8_decode($_POST['nome']);
	
	//Verifica se o nome é valido:
		$nomeLength = strlen(str_replace(' ', '', $nome));
		if($nomeLength <= 40 
		&& $nomeLength >= 8){
			$validaNome = true;
		}
}
	
	
if(isset($_POST['mensagem'])) {
	$mensagem = utf8_decode($_POST['mensagem']);
		
	//Verifica se o mensagem é valida:
		$mensagemLength = strlen(str_replace(' ', '', $mensagem));
		if($mensagemLength <= 1500 
		&& $mensagemLength >= 20){
			$validaMensagem = true;
		}		
}

if(isset($_POST['assunto'])) {
	$assunto = utf8_decode($_POST['assunto']);
		
	//Verifica se o assunto é valido:
		$assuntoLength = strlen(str_replace(' ', '', $assunto));
		if($assuntoLength <= 35 
		&& $assuntoLength >= 8){
			$validaAssunto = true;
		}		
}
		
if(isset($_POST['cidade'])) {
	$cidade = utf8_decode($_POST['cidade']);

	//Verifica se o cidade é valida:
	$cidadeLength = strlen(str_replace(' ', '', $cidade));
	if($cidadeLength <= 30 
	&& $cidadeLength >= 3){
		$validaCidade = true;
	}
}

if(isset($_POST['telefone'])) {
	$telefone = $_POST['telefone'];

	//Verifica se o telefone é valido:
	$telefoneLength = strlen(str_replace(' ', '', $telefone));
	if($telefoneLength == 13 
	|| $telefoneLength == 14){
		$validaTelefone = true;
	}
}

if(isset($_POST['cpf'])){
	
	$cpf = $_POST['cpf'];
	//Verifica se CPF é válido
	$validaCPF = validaCPF($cpf);
} 

if(isset($_POST['email'])) {
	$email = utf8_decode($_POST['email']);

	//Remove todos os carasteres ilegais
	$emailFiltrado = filter_var($email, FILTER_SANITIZE_EMAIL);
	$emailFiltradoValidado = filter_var($emailFiltrado, FILTER_VALIDATE_EMAIL);

	//Verifica se o email é valido:
		$emailLength = strlen($email);
		
		if($emailLength <= 40 
		&& $emailLength >= 8 
		&& $emailFiltradoValidado){
			$validaEmail = true;
		}
}


	
			