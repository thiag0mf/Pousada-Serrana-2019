<?php

require './_sql/connect.php';

//$a1 = Data de check-in que o cliente deseja reservar
//$a2 = Data de check-out que o cliente deseja reservar

// $a1 = '2019-04-13';
// $a2 = '2019-04-14';

// //$b1 = Data de check-in já reservada no banco de dados
// //$b2 = Data de check-out já reservada no banco de dados

// $b1 = '2019-04-13';
// $b2 = '2019-04-16';


// $checkIn = '2019-04-15';
// $checkOut =' 2019-04-20';
// $quarto = 'Standart';

// $qtdQuarto = getMultipleValues("SELECT qtdQuartos FROM quartos WHERE nomeQuarto = '$quarto'");

// $reservas = getMultipleObjectsInArray("SELECT checkIn, checkOut FROM reserva WHERE quarto = '$quarto'");

// echo $qtdQuarto[0]."<br>";
// echo count($reservas)."<br>";
// echo 'Check-in: '.$a1."<br>";
// echo 'Check-out: '.$a2."<br>";
// echo "<br><br>";

// if(!$qtdQuarto[0] > count($reservas)){
//     echo 'Reserva possível';
// }else{

//     $erros = array();

//     foreach ($reservas as $key => $value) {
//         $checkInReservado =  $value['checkIn'];
//         $checkOutReservado = $value['checkOut'];

//         echo "Check-in reservado: ".$checkInReservado."<br>";
//         echo "Check-out reservado: ".$checkOutReservado."<br><br>";

//         if(!verificaReserva($a1, $a2, $checkInReservado, $checkOutReservado)){
//             array_push($erros, false);
//             echo "Erro <br><br>";
//         }
//     }

//     if(count($erros)){
//         echo 'Não é possível cadastrar!';
//     }
//     else{
//         echo 'É possível cadastrar!';
//     }
// }


// //Retorna os dados em um array, uma propriedade de cada row
// function getMultipleObjectsInArray($sql){
//     require '_sql/connect.php';

//     $dados = mysqli_query($connect, $sql);
//     $array = array();

//     while($resultado = mysqli_fetch_assoc($dados)){
//         array_push($array, $resultado);
//     }

//     // $resultado = mysqli_fetch_assoc($dados);

//     return $array;
// }

// //Função que verifica se é possível fazer reserva nas datas desejadas
// function verificaReserva($a1, $a2, $b1, $b2){
//     $erro = array();

//     if(strtotime($a1) > strtotime($b1) && strtotime($a1) < strtotime($b2)) array_push($erro, false);
//     if(strtotime($a2) <= strtotime($b2) && strtotime($a2) > strtotime($b1)) array_push($erro, false);
//     if(strtotime($a1) < strtotime($b2) && strtotime($a2) >= strtotime($b2)) array_push($erro, false);

//     return count($erro) == 0;
// }

// //Retorna os dados em um array, uma propriedade de cada row
// function getMultipleValues($sql){
//     require '_sql/connect.php';

//     $dados = mysqli_query($connect, $sql);
//     $array = array();

//     while($resultado = mysqli_fetch_array($dados)){
//         array_push($array, $resultado[0]);
//     }

//     return $array;
// }


// $emails = getMultipleValues("SELECT email FROM `clientes_contato` WHERE newsletter = 1");
                        

// print_r($emails);



// //Retorna os dados em um array, uma propriedade de cada row
// function getMultipleObjectsInArray($sql){
//     require '_sql/connect.php';

//     $dados = mysqli_query($connect, $sql);
//     $array = array();

//     while($resultado = mysqli_fetch_assoc($dados)){
//         array_push($array, $resultado);
//     }

//     // $resultado = mysqli_fetch_assoc($dados);

//     return $array;
// }
        
// //Retorna os dados em um array, uma propriedade de cada row
// function getMultipleValues($sql){
//     require '_sql/connect.php';

//     $dados = mysqli_query($connect, $sql);
//     $array = array();

//     while($resultado = mysqli_fetch_array($dados)){
//         array_push($array, $resultado[0]);
//     }

//     return $array;
// }

$datainicio = strtotime("2019-03-25");

$datafim = strtotime("2019-04-01");

$intervalo=($datafim-$datainicio)/86400; //transformação do timestamp em dias

print $intervalo;
