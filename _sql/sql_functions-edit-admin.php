<?php

require_once './connect.php';
require_once './../_session/session_verify.php';

session_start();

    $loginSessao = $_SESSION['login'];

    //Salva a imagem
    $erros = [];

    //Pega a imagem e o nome
    $imagem = $_FILES['imagem'];
    $nomeImagem = $imagem['name'];
    $nomeImagemTemp = $imagem['tmp_name'];

    //Recebe a extensão
    $extensao = pathinfo($nomeImagem, PATHINFO_EXTENSION);

    //VALIDAÇÃO
    if(!preg_match("/^image\/(pjpeg|jpg|jpeg|png|gif|bmp)$/", $imagem['type'])):
        $erros[0] = "Extensão inválida";
    endif;

    if($imagem['size'] <= 5120):
        $erros[1] = "Imagem muito grande! Deve conter até 5 MB";
    endif;

    //Se não tiver erros, faz upload da imagem
    if(count($erros) == 0):
        $novoNomeImagem = uniqid (time ()) . '.' . $extensao;
        
        $destino = '_images/_uploaded/'.$novoNomeImagem;
        
        //Move o arquivo para a pasta
        if(@move_uploaded_file( $nomeImagemTemp, '../'.$destino )):
            
            //Pega o caminho da imagem antiga
            $sql = "SELECT profile_img FROM login_admin WHERE login='$loginSessao'";
            $caminhoAntigo = mysqli_fetch_assoc(mysqli_query($connect, $sql));
            
            //Salva o caminho da imagem no BD
            $sql = "UPDATE login_admin SET profile_img='$destino' WHERE login='$loginSessao'";

            if(mysqli_query($connect, $sql)):
                //Apaga a imagem
                unlink('../'.$caminhoAntigo['profile_img']);
            endif;

            //Coloca o caminho da imagem em uma variável de sessão
            $_SESSION['profile_img'] = $destino;
            
            echo '<br> Enviado para '.$_SESSION['profile_img'].' <br>Caminho antigo: '.$caminhoAntigo['profile_img'];

        endif;
    else:
        echo 'Não enviado! <br>';
        
        //Imprime os erros
        foreach ($erros as $erros => $value):
            echo $value."<br>";
        endforeach;
    endif;

    //Fecha a conexão
    mysqli_close($connect);

    //Redireciona para o admin
    header('location: ../'.$_SESSION['ultima_pagina']);
