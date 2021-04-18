<?php

$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];
$quarto = $_POST['quartos'];

$currentDate = date("Y-m-d");

global $valorReserva;

$erros = array();

$qtdQuarto = getMultipleValues("SELECT qtdQuartos FROM quartos WHERE nomeQuarto = '$quarto'");

$reservas = getMultipleObjectsInArray("SELECT checkIn, checkOut FROM reserva WHERE quarto = '$quarto'");

if(strtotime($checkIn) >= strtotime($checkOut) || $checkIn == '' || $checkOut == '' || strtotime($checkIn) < strtotime($currentDate)){
    $reservaAutorizada = false;
}
else{

    if($qtdQuarto[0] > count($reservas) - 1){
        $reservaAutorizada = true;
    }
    else{

        $reservasNestaData = array();
    
        foreach ($reservas as $key => $value) {
            $checkInReservado =  $value['checkIn'];
            $checkOutReservado = $value['checkOut'];
    
            if(!verificaReserva($checkIn, $checkOut, $checkInReservado, $checkOutReservado)){
                array_push($reservasNestaData, false);
            }
        }
    
        if(count($erros)){
            $reservaAutorizada = false;
        }
        else{
            if(count($reservasNestaData) < $qtdQuarto){
                $reservaAutorizada = true;
            }
        }
    }
}

if($reservaAutorizada){
    $valorQuarto = getValores("SELECT valor FROM quartos WHERE nomeQuarto = '$quarto'");

    $qtdDias = (strtotime($checkOut) - strtotime($checkIn))/86400;

    $valorReserva = $qtdDias * $valorQuarto['valor'];
}
else{
    $valorReserva = 00;
}

