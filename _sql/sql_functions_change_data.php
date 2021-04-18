<?php

require_once './connect.php';
require_once './../_session/session_verify.php';

$option = $_POST['option'];
$erros = array();

switch ($option) {
    case 'geral':

        //Faz upload do favicon
        if(isset($_FILES['faviconImage'])){

            $savePath = '_images/';

            $sqlNomeTabela = 'icons';

            $sqlColunaSrc = 'src';

            $condicao = "nome = 'favicon'";

            print_r(saveImagem($_FILES['faviconImage'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));
        }

        //Faz upload da logo principal
        if(isset($_FILES['logoPrincipal'])){

            $savePath = '_images/_logos/';

            $sqlNomeTabela = 'icons';

            $sqlColunaSrc = 'src';

            $condicao = "nome = 'icon_dark'";

            print_r(saveImagem($_FILES['logoPrincipal'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));

        }

        //Faz upload da logo secundária
        if(isset($_FILES['logoClara'])){

            $savePath = '_images/_logos/';

            $sqlNomeTabela = 'icons';

            $sqlColunaSrc = 'src';

            $condicao = "nome = 'icon_light'";

            print_r(saveImagem($_FILES['logoClara'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));
        }
        
        break;

    case 'home':

        //Faz upload da imagem de fundo        
        if(isset($_FILES['imagemFundo'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'bgimagens';

            $sqlColunaSrc = 'src';

            $condicao = "section = 'home'";

            print_r(saveImagem($_FILES['imagemFundo'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));
        }

        //Faz upload do título
        if(isset($_POST['homeTitulo'])){
            $tabela = 'capa';

            $coluna = 'tituloCapa';

            $valor = $_POST['homeTitulo'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload de subtítulo
        if(isset($_POST['homeSubtitulo'])){
            $tabela = 'capa';

            $coluna = 'subtituloCapa';

            $valor = $_POST['homeSubtitulo'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Aproveite o Clima Serrano
        //HOSPEDE-SE CONOSCO!
        //_images/_index/image-06.jpg


        break;

    case 'reserve':

        //Faz upload da imagem de fundo        
        if(isset($_FILES['imagemCheckIn'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'reservaimagens';

            $sqlColunaSrc = 'src';

            $condicao = "section = 'check-in'";

            print_r(saveImagem($_FILES['imagemCheckIn'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));
        }

        //Faz upload da imagem de fundo        
        if(isset($_FILES['imagemCheckOut'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'reservaimagens';

            $sqlColunaSrc = 'src';

            $condicao = "section = 'check-out'";

            print_r(saveImagem($_FILES['imagemCheckOut'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));
        }

        //Faz upload da imagem de fundo        
        if(isset($_FILES['imagemQuartos'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'reservaimagens';

            $sqlColunaSrc = 'src';

            $condicao = "section = 'quartos'";

            print_r(saveImagem($_FILES['imagemQuartos'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));
        }

        //Faz upload da imagem de fundo        
        if(isset($_FILES['imagemClientes'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'reservaimagens';

            $sqlColunaSrc = 'src';

            $condicao = "section = 'clientes'";

            print_r(saveImagem($_FILES['imagemClientes'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));
        }
        
        break;

    case 'localizacao':

        //localizacaoImagemFundo localizacaoTitulo localizacaoSubtitulo localizacaoTexto

        //Faz upload da imagem de fundo        
        if(isset($_FILES['localizacaoImagemFundo'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'bgimagens';

            $sqlColunaSrc = 'src';

            $condicao = "section = 'localizacao'";

            print_r(saveImagem($_FILES['localizacaoImagemFundo'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));
        }

        //Faz upload do título
        if(isset($_POST['localizacaoTitulo'])){
            $tabela = 'localizacao';

            $coluna = 'titulo';

            $valor = $_POST['localizacaoTitulo'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload do subtitulo
        if(isset($_POST['localizacaoSubtitulo'])){
            $tabela = 'localizacao';

            $coluna = 'subTitulo';

            $valor = $_POST['localizacaoSubtitulo'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload do texto
        if(isset($_POST['localizacaoTexto'])){
            $tabela = 'localizacao';

            $coluna = 'texto';

            $valor = $_POST['localizacaoTexto'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //_images/_index/imagem-02.jpg
        //Bem-vindo a nossa pousada
        //Bem-vindo a pousada Serrana
        // A Pousada Serrana está localizada em Tianguá, na Serra da Ibiapaba, um paraíso de clima ameno e belezas naturais no extremo oeste do Ceará, na divisa com o Piauí, a pouco mais de 300km de Fortaleza. Cachoeiras, mirantes, bicas, trilhas ecológicas e a belíssima flora compõem a paisagem de nossa região. Há vários pontos de visitação em todos os municípios da Serra, ideal para quem busca tranquilidade e um pouco de contato com a natureza.
        
        break;

    case 'quartoStandart':

        //imagensStandart
        $idImagens = $_POST['idImagemStandart'];

        //Troca as imagens dos quarto        
        if(isset($_FILES['imagensStandart'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'quartos_images';

            $sqlColunaSrc = 'src';
            
            
            foreach ($_FILES["imagensStandart"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $id = $idImagens[$key];

                    echo $id . '<br>';
        
                    $condicao = "id = '$id'";
                    
                    print_r(saveImagemMultiple($_FILES['imagensStandart'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao, $key));
                }
            }
        }

        //Adiciona mais uma imagem ao quarto       
        if(isset($_FILES['newImagemStandart'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'quartos_images';

            $colunas = array('id', 'nome_quarto', 'src');

            $valores = array('NULL', 'standart');

            print_r(addNewImagem($_FILES['newImagemStandart'], $savePath, $sqlNomeTabela, $colunas, $valores));
        }

        //Faz upload do texto
        if(isset($_POST['quartoPessoasStandart'])){
            $tabela = 'quartos';

            $coluna = 'numeroPessoas';

            $valor = $_POST['quartoPessoasStandart'];

            $condicao = "nomeQuarto = 'Standart'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoCamasStandart'])){
            $tabela = 'quartos';

            $coluna = 'camaQuarto';

            $valor = $_POST['quartoCamasStandart'];

            $condicao = "nomeQuarto = 'Standart'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoBanheiroStandart'])){
            $tabela = 'quartos';

            $coluna = 'banheiroQuarto';

            $valor = $_POST['quartoBanheiroStandart'];

            $condicao = "nomeQuarto = 'Standart'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoAreaStandart'])){
            $tabela = 'quartos';

            $coluna = 'area';

            $valor = $_POST['quartoAreaStandart'];

            $condicao = "nomeQuarto = 'Standart'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoValorStandart'])){
            $tabela = 'quartos';

            $coluna = 'valor';

            $valor = $_POST['quartoValorStandart'];

            $condicao = "nomeQuarto = 'Standart'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoTextoStandart'])){
            $tabela = 'quartos';

            $coluna = 'descricaoQuarto';

            $valor = $_POST['quartoTextoStandart'];

            $condicao = "nomeQuarto = 'Standart'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }


        break;

    case 'quartoPremium':

        $idImagens = $_POST['idImagemPremium'];

        //Troca as imagens dos quarto        
        if(isset($_FILES['imagensPremium'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'quartos_images';

            $sqlColunaSrc = 'src';
            
            
            foreach ($_FILES["imagensPremium"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $id = $idImagens[$key];

                    echo $id . '<br>';
        
                    $condicao = "id = '$id'";
                    
                    print_r(saveImagemMultiple($_FILES['imagensPremium'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao, $key));
                }
            }
        }

        //Adiciona mais uma imagem ao quarto       
        if(isset($_FILES['newImagemPremium'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'quartos_images';

            $colunas = array('id', 'nome_quarto', 'src');

            $valores = array('NULL', 'premium');

            print_r(addNewImagem($_FILES['newImagemPremium'], $savePath, $sqlNomeTabela, $colunas, $valores));
        }

        //Faz upload do texto
        if(isset($_POST['quartoPessoasPremium'])){
            $tabela = 'quartos';

            $coluna = 'numeroPessoas';

            $valor = $_POST['quartoPessoasPremium'];

            $condicao = "nomeQuarto = 'Premium'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoCamasPremium'])){
            $tabela = 'quartos';

            $coluna = 'camaQuarto';

            $valor = $_POST['quartoCamasPremium'];

            $condicao = "nomeQuarto = 'Premium'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoBanheiroPremium'])){
            $tabela = 'quartos';

            $coluna = 'banheiroQuarto';

            $valor = $_POST['quartoBanheiroPremium'];

            $condicao = "nomeQuarto = 'Premium'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoAreaPremium'])){
            $tabela = 'quartos';

            $coluna = 'area';

            $valor = $_POST['quartoAreaPremium'];

            $condicao = "nomeQuarto = 'Premium'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoValorPremium'])){
            $tabela = 'quartos';

            $coluna = 'valor';

            $valor = $_POST['quartoValorPremium'];

            $condicao = "nomeQuarto = 'Premium'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoTextoPremium'])){
            $tabela = 'quartos';

            $coluna = 'descricaoQuarto';

            $valor = $_POST['quartoTextoPremium'];

            $condicao = "nomeQuarto = 'Premium'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        
        break;

    case 'quartoDeluxe':
        //imagensStandart
        $idImagens = $_POST['idImagemDeluxe'];

        print_r($idImagens);

        //Troca as imagens dos quarto        
        if(isset($_FILES['imagensDeluxe'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'quartos_images';

            $sqlColunaSrc = 'src';
            
            
            foreach ($_FILES["imagensDeluxe"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $id = $idImagens[$key];

                    echo $id . '<br>';
        
                    $condicao = "id = '$id'";
                    
                    print_r(saveImagemMultiple($_FILES['imagensDeluxe'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao, $key));
                }
            }
        }

        //Adiciona mais uma imagem ao quarto       
        if(isset($_FILES['newImagemDeluxe'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'quartos_images';

            $colunas = array('id', 'nome_quarto', 'src');

            $valores = array('NULL', 'deluxe');

            print_r(addNewImagem($_FILES['newImagemDeluxe'], $savePath, $sqlNomeTabela, $colunas, $valores));
        }

        //Faz upload do texto
        if(isset($_POST['quartoPessoasDeluxe'])){
            $tabela = 'quartos';

            $coluna = 'numeroPessoas';

            $valor = $_POST['quartoPessoasDeluxe'];

            $condicao = "nomeQuarto = 'Deluxe'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoCamasDeluxe'])){
            $tabela = 'quartos';

            $coluna = 'camaQuarto';

            $valor = $_POST['quartoCamasDeluxe'];

            $condicao = "nomeQuarto = 'Deluxe'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoBanheiroDeluxe'])){
            $tabela = 'quartos';

            $coluna = 'banheiroQuarto';

            $valor = $_POST['quartoBanheiroDeluxe'];

            $condicao = "nomeQuarto = 'Deluxe'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoAreaDeluxe'])){
            $tabela = 'quartos';

            $coluna = 'area';

            $valor = $_POST['quartoAreaDeluxe'];

            $condicao = "nomeQuarto = 'Deluxe'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoValorDeluxe'])){
            $tabela = 'quartos';

            $coluna = 'valor';

            $valor = $_POST['quartoValorDeluxe'];

            $condicao = "nomeQuarto = 'Deluxe'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['quartoTextoDeluxe'])){

            $tabela = 'quartos';

            $coluna = 'descricaoQuarto';

            $valor = $_POST['quartoTextoDeluxe'];

            $condicao = "nomeQuarto = 'Deluxe'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        break;

    case 'apresentacao':

        //imagemFundoApresentacao reserveTexto restauranteTexto transporteTexto spaTexto


        //Faz upload da imagem de fundo        
        if(isset($_FILES['imagemFundoApresentacao'])){

            $savePath = '_images/_index/';

            $sqlNomeTabela = 'bgimagens';

            $sqlColunaSrc = 'src';

            $condicao = "section = 'apresentacao'";

            print_r(saveImagem($_FILES['imagemFundoApresentacao'], $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao));
        }

        //Faz upload do texto
        if(isset($_POST['reserveTexto'])){
            $tabela = 'apresentacao';

            $coluna = 'texto';

            $valor = $_POST['reserveTexto'];

            $condicao = "titulo = 'Reserve-se'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['restauranteTexto'])){
            $tabela = 'apresentacao';

            $coluna = 'texto';

            $valor = $_POST['restauranteTexto'];

            $condicao = "titulo = 'Restaurante'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['transporteTexto'])){
            $tabela = 'apresentacao';

            $coluna = 'texto';

            $valor = $_POST['transporteTexto'];

            $condicao = "titulo = 'Transporte'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['spaTexto'])){
            $tabela = 'apresentacao';

            $coluna = 'texto';

            $valor = $_POST['spaTexto'];

            $condicao = "titulo = 'Spa'";

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faça sua reserva com apenas alguns cliques, sem sair de casa e com um precinho camarada.
        //Usufrua de um restaurante completo e um café da manhã por nossa conta.
        //Nossa pousada fica muito bem localizada, próximo à rotas de táxis e vans.
        //Contamos com uma equipe especializada em estética e relaxamento.
        //_images/_index/image-01.jpg
        
        
        break;

    case 'rodape':

        //rodapeLinkFacebook rodapeLinkInstagram rodapeLinkBooking rodapeLinkAirbnb rodapeGanheCupons rodapePromocoes rodapeServicos rodapeSobreNos rodapeTermosUso rodapeEndereco rodapeTelefone rodapeEmail 

        //Faz upload do texto
        if(isset($_POST['rodapeLinkFacebook'])){
            $tabela = 'dados';

            $coluna = 'link_facebook';

            $valor = $_POST['rodapeLinkFacebook'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapeLinkInstagram'])){
            $tabela = 'dados';

            $coluna = 'link_instagram';

            $valor = $_POST['rodapeLinkInstagram'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapeLinkBooking'])){
            $tabela = 'dados';

            $coluna = 'link_booking';

            $valor = $_POST['rodapeLinkBooking'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapeLinkAirbnb'])){
            $tabela = 'dados';

            $coluna = 'link_airbnb';

            $valor = $_POST['rodapeLinkAirbnb'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapeEndereco'])){
            $tabela = 'dados';

            $coluna = 'enderecoDados';

            $valor = $_POST['rodapeEndereco'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapeTelefone'])){
            $tabela = 'dados';

            $coluna = 'telefoneDados';

            $valor = $_POST['rodapeTelefone'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapeEmail'])){
            $tabela = 'dados';

            $coluna = 'emailDados';

            $valor = $_POST['rodapeEmail'];

            print_r(updateSQL($tabela, $coluna, $valor, 1));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapeGanheCupons'])){
            $tabela = 'linksuteis';

            $coluna = 'texto';

            $condicao = "nome = 'ganheCupons'";

            $valor = $_POST['rodapeGanheCupons'];

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapePromocoes'])){
            $tabela = 'linksuteis';

            $coluna = 'texto';

            $condicao = "nome = 'promocoes'";

            $valor = $_POST['rodapePromocoes'];

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapeServicos'])){
            $tabela = 'privacidade';

            $coluna = 'texto';

            $condicao = "nome = 'servicos'";

            $valor = $_POST['rodapeServicos'];

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //Faz upload do texto
        if(isset($_POST['rodapeSobreNos'])){
            $tabela = 'privacidade';

            $coluna = 'texto';

            $condicao = "nome = 'sobreNos'";

            $valor = $_POST['rodapeSobreNos'];

            print_r(updateSQL($tabela, $coluna, $valor, $condicao));            
        }

        //addSQL($tabela, $colunas, $valores)

        //Faz upload do texto
        if(isset($_POST['rodapeTermosUso'])){
            $tabela = 'privacidade';

            $colunas = array('id', 'nome', 'texto');

            $valor = $_POST['rodapeTermosUso'];

            $valores = array('NULL', 'termosUso', $valor);

            print_r(addSQL($tabela, $colunas, $valores));            
        }



        //Na data de check-in o cliente responsável pelo cadastro deverá levar documentos de identificação, e em casos de erros, a responsabilidade é do cliente
        
        break;

    case 'excluirTermo':

        $erros = array();

        $idTermo = $_POST['idTermo'];

        $sql = "DELETE FROM privacidade WHERE id='$idTermo'";

        $resultado = mysqli_query($connect, $sql);

        echo json_encode(array('resultado' => $resultado));

        break;

    case 'excluirImagem':
        $erros = array();

        $idImagem = $_POST['idImagem'];

        $sql = "DELETE FROM quartos_images WHERE id='$idImagem'";

        $resultado = mysqli_query($connect, $sql);

        echo json_encode(array('resultado' => $resultado));

        break;

    default:
        
        break;
}


function saveImagem($getImagem, $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao){
    require './connect.php';

    unset($erros);

    $erros = array();

    $imagem = $getImagem;
    $nomeImagem = $imagem['name'];
    $nomeImagemTemp = $imagem['tmp_name'];

    //Recebe a extensão
    $extensao = pathinfo($nomeImagem, PATHINFO_EXTENSION);

    //VALIDAÇÃO
    if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/', $imagem['type'])):
        array_push($erros, "Extensão inválida: $extensao");
    endif;

    if($imagem['size'] >= 10485760):
        array_push($erros, "Imagem muito grande! Deve conter até 10 MB");
    endif;

    //Se não tiver erros, faz upload da imagem
    if(count($erros) == 0):
        $novoNomeImagem = uniqid (time ()) . '.' . $extensao;
        
        $destino = $savePath.$novoNomeImagem;
        echo '<br>nomeTempImagem: '.$nomeImagemTemp.' - destino: '.$destino.'<br>';
        
        //Move o arquivo para a pasta
        if(@move_uploaded_file( $nomeImagemTemp, '../'.$destino )):
            
            //Pega o caminho da imagem antiga
            $sql = "SELECT $sqlColunaSrc FROM $sqlNomeTabela WHERE $condicao";
            $caminhoAntigo = mysqli_fetch_array(mysqli_query($connect, $sql));
            
            //Salva o caminho da imagem no BD
            $sql = "UPDATE $sqlNomeTabela SET $sqlColunaSrc='$destino' WHERE $condicao";

            if(mysqli_query($connect, $sql)):
                //Apaga a imagem
                if(!unlink('../'.$caminhoAntigo[0])){
                    array_push($erros, "Erro ao apagar imagem!");
                }
                
            endif;


        endif;
    endif;

    return $erros;
}

function saveImagemMultiple($getImagem, $savePath, $sqlNomeTabela, $sqlColunaSrc, $condicao, $key){
    require './connect.php';

    unset($erros);

    $erros = array();

    $imagem = $getImagem;
    $nomeImagem = $imagem['name'][$key];
    $nomeImagemTemp = $imagem['tmp_name'][$key];

    //Recebe a extensão
    $extensao = pathinfo($nomeImagem, PATHINFO_EXTENSION);

    //VALIDAÇÃO
    if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/', $imagem['type'][$key])):
        array_push($erros, "Extensão inválida: $extensao");
    endif;

    if($imagem['size'][$key] >= 10485760):
        array_push($erros, "Imagem muito grande! Deve conter até 10 MB");
    endif;

    //Se não tiver erros, faz upload da imagem
    if(count($erros) == 0):
        $novoNomeImagem = uniqid (time ()) . '.' . $extensao;
        
        $destino = $savePath.$novoNomeImagem;
        echo '<br>nomeTempImagem: '.$nomeImagemTemp.' - destino: '.$destino.'<br>';
        
        //Move o arquivo para a pasta
        if(@move_uploaded_file( $nomeImagemTemp, '../'.$destino )):
            
            //Pega o caminho da imagem antiga
            $sql = "SELECT $sqlColunaSrc FROM $sqlNomeTabela WHERE $condicao";
            $caminhoAntigo = mysqli_fetch_array(mysqli_query($connect, $sql));
            
            //Salva o caminho da imagem no BD
            $sql = "UPDATE $sqlNomeTabela SET $sqlColunaSrc='$destino' WHERE $condicao";

            if(mysqli_query($connect, $sql)):
                //Apaga a imagem
                if(!unlink('../'.$caminhoAntigo[0])){
                    array_push($erros, "Erro ao apagar imagem!");
                }
                
            endif;


        endif;
    endif;

    return $erros;
}

function addNewImagem($getImagem, $savePath, $tabela, $colunas, $valores){
    require './connect.php';

    unset($erros);

    $erros = array();

    $imagem = $getImagem;
    $nomeImagem = $imagem['name'];
    $nomeImagemTemp = $imagem['tmp_name'];

    //Recebe a extensão
    $extensao = pathinfo($nomeImagem, PATHINFO_EXTENSION);

    //VALIDAÇÃO
    if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/', $imagem['type'])):
        array_push($erros, "Extensão inválida: $extensao");
    endif;

    if($imagem['size'] >= 10485760):
        array_push($erros, "Imagem muito grande! Deve conter até 10 MB");
    endif;

    //Se não tiver erros, faz upload da imagem
    if(count($erros) == 0):
        $novoNomeImagem = uniqid (time ()) . '.' . $extensao;
        
        $destino = $savePath.$novoNomeImagem;
        echo '<br>nomeTempImagem: '.$nomeImagemTemp.' - destino: '.$destino.'<br>';
        
        //Move o arquivo para a pasta
        if(@move_uploaded_file( $nomeImagemTemp, '../'.$destino )):

            
            
            array_push($valores, $destino);

            addSQL($tabela, $colunas, $valores);

        endif;
    endif;

    return $erros;
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

//Executa sql
function updateSQL($tabela, $coluna, $valor, $condicao){
    require 'connect.php';

    if($valor != ''){
        $valorEncoded = $valor;
    
        $sql = "UPDATE $tabela SET $coluna = '$valorEncoded' WHERE $condicao";
    
        return  mysqli_query($connect, $sql);
    }
}

function addSQL($tabela, $colunas, $valores){
    require 'connect.php';

    $erros = array();
    global $valoresFormatados;
    global $colunasFormatadas;
    
    foreach ($colunas as $key => $value) {

        $valor = $valores[$key];

        if($valor != 'NULL'){
            $valoresFormatados .= "'";
            
            $valoresFormatados .= $valor;
    
            $valoresFormatados .= "',";
        }
        else{
            $valoresFormatados .= $valor . ',';
        }


        $colunasFormatadas .= $value . ',';
        
    }

    //Retira a ultima virgula
    $valoresFormatados = substr($valoresFormatados, 0, -1);
    $colunasFormatadas = substr($colunasFormatadas, 0, -1);
    
    $sql = "INSERT INTO $tabela($colunasFormatadas) VALUES ($valoresFormatados)";

    echo $sql . '<br>';
    
    array_push($erros, mysqli_query($connect, $sql));

    return $erros;

}

//Redireciona para o admin
header('location: ../'.$_SESSION['ultima_pagina']);
