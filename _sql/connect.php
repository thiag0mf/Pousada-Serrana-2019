<?php

    $url = 'localhost';
    $user = 'root';
    $password = '';
    $BD = 'pousada';

    $connect = mysqli_connect($url, $user, $password, $BD) or die("Erro ao acessar BD"); 