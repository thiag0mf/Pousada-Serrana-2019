<?php
session_start();

//IDENTIFICAR QUAL É O CAMINHO PARA O INDEX:
$path = '';
while (file_exists($path.'index.php') == false) {
    $path = $path.'../';
}

if(!$_SESSION['logado']):
    header('location: '.$path.'admin-login.php');
endif;

if(isset($_GET['logout'])):
    $logout = $_GET['logout'];
    if($logout):
        session_destroy();
        header('location: '.$path.'admin-login.php');
    endif;
    
endif;