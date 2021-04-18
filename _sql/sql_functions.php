<?php
 

// =======================================
//                GERAL
// ======================================

$valores = getValores("SELECT src FROM icons WHERE nome = 'favicon'");

$geral['favicon'] = $valores['src'];

$valores = getValores("SELECT src FROM icons WHERE nome = 'icon_dark'");

$geral['icon_dark'] = $valores['src'];

$valores = getValores("SELECT src FROM icons WHERE nome = 'icon_light'");

$geral['icon_light'] = $valores['src'];


// =======================================
//                 CAPA
// ======================================

$valores = getValores("SELECT * FROM capa");

$capa['titulo'] = $valores['tituloCapa'];
$capa['subtitulo'] = $valores['subtituloCapa'];

$valores = getValores("SELECT src FROM bgimagens WHERE section = 'home'");

$capa['bgImagem'] = $valores['src'];


// =======================================
//                 RESERVE
// ======================================

$valores = getValores("SELECT src FROM reservaimagens WHERE section = 'check-in'");
$reserva['check-in'] = $valores['src'];

$valores = getValores("SELECT src FROM reservaimagens WHERE section = 'check-out'");
$reserva['check-out'] = $valores['src'];

$valores = getValores("SELECT src FROM reservaimagens WHERE section = 'quartos'");
$reserva['quartos'] = $valores['src'];

$valores = getValores("SELECT src FROM reservaimagens WHERE section = 'clientes'");
$reserva['clientes'] = $valores['src'];

// =======================================
//               LOCALIZACÃO
// ======================================

$valores = getValores("SELECT * FROM localizacao");

$localizacao['titulo'] = $valores['titulo'];
$localizacao['subtitulo'] = $valores['subTitulo'];
$localizacao['texto'] = $valores['texto'];

$valores = getValores("SELECT src FROM bgimagens WHERE section = 'localizacao'");

$localizacao['bgImagem'] = $valores['src'];

// =======================================
//               ACOMODAÇÕES
// ======================================

//STANDART
$valores = getValores("SELECT * FROM quartos WHERE nomeQuarto = 'Standart'");

$quartos['standart']['nomeQuarto'] = $valores['nomeQuarto'];
$quartos['standart']['nPessoas'] = isPlural('PESSOA', $valores['numeroPessoas']);
$quartos['standart']['camas'] =  isPlural('CAMA', $valores['camaQuarto']);
$quartos['standart']['banheiros'] = isPlural('BANHEIRO', $valores['banheiroQuarto']);
$quartos['standart']['area'] = $valores['area'];
$quartos['standart']['valor'] = $valores['valor'];
$quartos['standart']['descricao'] = $valores['descricaoQuarto'];

$quartos['standart']['images'] = getMultipleValues("SELECT src FROM quartos_images WHERE nome_quarto = 'standart'");
$quartos['standart']['idImages'] = getMultipleValues("SELECT id FROM quartos_images WHERE nome_quarto = 'standart'");

//PREMIUM
$valores = getValores("SELECT * FROM quartos WHERE nomeQuarto = 'Premium'");

$quartos['premium']['nomeQuarto'] = $valores['nomeQuarto'];
$quartos['premium']['nPessoas'] = isPlural('PESSOA', $valores['numeroPessoas']);
$quartos['premium']['camas'] =  isPlural('CAMA', $valores['camaQuarto']);
$quartos['premium']['banheiros'] = isPlural('BANHEIRO', $valores['banheiroQuarto']);
$quartos['premium']['area'] = $valores['area'];
$quartos['premium']['valor'] = $valores['valor'];
$quartos['premium']['descricao'] = $valores['descricaoQuarto'];

$quartos['premium']['images'] = getMultipleValues("SELECT src FROM quartos_images WHERE nome_quarto = 'premium'");
$quartos['premium']['idImages'] = getMultipleValues("SELECT id FROM quartos_images WHERE nome_quarto = 'premium'");

//DELUXE
$valores = getValores("SELECT * FROM quartos WHERE nomeQuarto = 'Deluxe'");

$quartos['deluxe']['nomeQuarto'] = $valores['nomeQuarto'];
$quartos['deluxe']['nPessoas'] = isPlural('PESSOA', $valores['numeroPessoas']);
$quartos['deluxe']['camas'] =  isPlural('CAMA', $valores['camaQuarto']);
$quartos['deluxe']['banheiros'] = isPlural('BANHEIRO', $valores['banheiroQuarto']);
$quartos['deluxe']['area'] = $valores['area'];
$quartos['deluxe']['valor'] = $valores['valor'];
$quartos['deluxe']['descricao'] = $valores['descricaoQuarto'];

$quartos['deluxe']['images'] = getMultipleValues("SELECT src FROM quartos_images WHERE nome_quarto = 'deluxe'");
$quartos['deluxe']['idImages'] = getMultipleValues("SELECT id FROM quartos_images WHERE nome_quarto = 'deluxe'");


// =======================================
//              APRESENTAÇÃO
// ======================================

//IMAGEM DE FUNDO
$valores = getValores("SELECT src FROM bgimagens WHERE section = 'apresentacao'");

$apresentacao['bgImagem'] = $valores['src'];

//RESERVE-SE
$valores = getValores("SELECT * FROM apresentacao WHERE titulo = 'Reserve-se'");

$apresentacao['reserve'] = $valores['texto'];

//RESTAURANTE
$valores = getValores("SELECT * FROM apresentacao WHERE titulo = 'Restaurante'");

$apresentacao['restaurante'] = $valores['texto'];

//TRANSPORTE
$valores = getValores("SELECT * FROM apresentacao WHERE titulo = 'Transporte'");

$apresentacao['transporte'] = $valores['texto'];

//SPA
$valores = getValores("SELECT * FROM apresentacao WHERE titulo = 'Spa'");

$apresentacao['spa'] = $valores['texto'];


// =======================================
//              RODAPÉ
// ======================================

//CONTATO
$valores = getValores("SELECT * FROM dados");

$dados['endereco'] = $valores['enderecoDados'];
$dados['telefone'] = $valores['telefoneDados'];
$dados['email'] = $valores['emailDados'];

//SOCIAL
$dados['facebook'] = $valores['link_facebook'];
$dados['instagram'] = $valores['link_instagram'];
$dados['booking'] = $valores['link_booking'];
$dados['airbnb'] = $valores['link_airbnb'];

//SERVIÇOS
$valores = getValores("SELECT * FROM privacidade WHERE nome = 'servicos'");

$privacidade['servicos'] = $valores['texto'];

//SOBRE NÓS
$valores = getValores("SELECT * FROM privacidade WHERE nome = 'sobreNos'");

$privacidade['sobreNos'] = $valores['texto'];

//TERMOS DE USO
$privacidade['termosUso'] = getMultipleValues("SELECT texto FROM privacidade WHERE nome = 'termosUso'");
$privacidade['termosUsoId'] = getMultipleValues("SELECT id FROM privacidade WHERE nome = 'termosUso'");

//GANHE CUPONS
$valores = getValores("SELECT texto FROM linksuteis WHERE nome = 'ganheCupons'");
$linksUteis['cupons'] = $valores['texto'];

//PROMOÇÕES
$valores = getValores("SELECT texto FROM linksuteis WHERE nome = 'promocoes'");
$linksUteis['promocoes'] = $valores['texto'];


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








