<?php
require_once './_sql/connect.php';

session_start();

if(isset($_POST['nome'])):
    $login = $_POST['nome'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT login, senha, profile_img FROM login_admin";
    
    $users = mysqli_query($connect, $sql);
    
    while($usersAssoc = mysqli_fetch_assoc($users)):
        $hash = $usersAssoc['senha'];
        
        if(password_verify($senha, $hash) && $usersAssoc['login'] == $login):

            $sql = "SELECT profile_img FROM login_admin WHERE login='$login'";
            $caminhoImagem = mysqli_fetch_assoc(mysqli_query($connect, $sql));

            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            $_SESSION['logado'] = true;
            $_SESSION['profile_img'] = $caminhoImagem['profile_img'];
            $_SESSION['ultima_pagina'] = 'admin.php';
            
            $sql = "UPDATE login_admin SET ultimo_login = NOW()";   
            mysqli_query($connect, $sql);             
            
            header('location: admin.php');

        else:
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['logado']);
            unset ($_SESSION['profile_img']);

        endif;

    endwhile;

endif;

if(isset($_SESSION['logado'])):
    header('location: admin.php');
endif;