<?php

require 'connect.php';

$currentDate = date("Y-m-d");

$sql = "DELETE FROM reserva WHERE checkOut < '$currentDate'";
mysqli_query($connect, $sql);