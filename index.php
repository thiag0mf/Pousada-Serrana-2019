<?php
    //IDENTIFICAR QUAL É O CAMINHO PARA O INDEX:
    $path = '';
    while (file_exists($path.'index.php') == false) {
        $path = $path.'../';
    }

    require $path.'_sql/sql_functions.php';
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pousada Serrana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICON -->
    <link href="<?php echo $geral['favicon']; ?>" rel="icon">

    <!-- INCLUDE CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'_css/index.min.css'?>">
    
    <!-- INCLUDE ICONS -->
    <link rel="stylesheet" href="<?php echo $path.'_fonts/flaticon/font/flaticon.css'?>">
    <link rel="stylesheet" href="<?php echo $path.'./_fonts/ionicons/css/ionicons.min.css'?>">
    <link rel="stylesheet" href="<?php echo $path.'./_fonts/icomoon/icomoon.css'?>">
    <link rel="stylesheet" href="<?php echo $path.'./_fonts/open-iconic/open-iconic-bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo $path.'./_fonts/socicon/style.css'?>">

    <style> 
        .background-image{
            background-image: url("<?php echo $capa['bgImagem']?>");
        }    
    </style>

	
</head>
<body id="pousada">
    <!-- HEADER.php -->
    <?php require $path.'_assets/header.php'?>

    
    <div class="background-image" data-source="">
        <h1 id="titleImg"><?php echo $capa['titulo']?></h1>
        <h2 class="subtitleImg"><?php echo $capa['subtitulo']?></h2>
    </div>
    
    <div class="content">
        
        <section class="reserva">
            <div class="container">
                <div class="row pt-4">
                    <div class="col mt-3">
                        <div class="title-holder">
                            <h2 class="titleSection text-center mt-3 animationSlideTop">RESERVE</h2>
                        </div>
                    </div>
                </div>
                <div class="row pt-3 mt-2" id="reserva">
                    <div class="col-sm-6 animationSlideRight col-lg-3 mt-5">
                        <div class="card bg-white shadow">
                            <img src="<?php echo $reserva['check-in']; ?>" alt="Check-in" class="card-img-top img img-fluid">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="check-in">Check-in</label>
                                    <input id="check-in" class="form-control" type="date">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 animationSlideRight col-lg-3 mt-5">
                        <div class="card bg-white shadow">
                            <img src="<?php echo $reserva['check-out'] ?>" alt="Check-out" class="card-img-top img img-fluid">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="check-out">Check-out</label>
                                    <input id="check-out" class="form-control" type="date">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 animationSlideRight col-lg-3 mt-5">
                        <div class="card bg-white shadow">
                            <img src="<?php echo $reserva['quartos']; ?>" alt="Quartos" class="card-img-top img img-fluid">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="quartos">Quartos</label>
                                    <div class="form-group">
                                        <select id="quartos" class="form-control">
                                            <option value="standart" selected>Standart</option>
                                            <option value="premium">Premium</option>
                                            <option value="deluxe">Deluxe</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 animationSlideRight col-lg-3 mt-5">
                        <div class="card bg-white shadow">
                            <img src="<?php echo $reserva['clientes']; ?>" alt="Clientes" class="card-img-top img img-fluid">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="clientes">Clientes</label>
                                    <div class="form-group">
                                        <select id="clientes" class="form-control">
                                            <option value="1" selected>1 Adulto</option>
                                            <option value="2">2 Adultos</option>
                                            <option value="3">3 Adultos</option>
                                            <option value="4">4 Adultos</option>
                                            <option value="5">5 Adultos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div> <!-- END ROW -->

                <div class="row p-4 py-5 p-sm-5">
                    <div class="col-12 px-sm-5">
                        <button class="btn btn-block mt-3 shadow-lg btn-check animationSlideTop" data-toggle="modal" data-target="#modalReservar">VERIFICAR DISPONIBILIDADE</button>
                    </div>
                </div>
            </div>
        </section> <!-- END RESERVA -->

        <section class="localizacao pt-5 pb-lg-5">

            <div class="">
                <div class="row pb-lg-3 pt-lg-4 justify-content-center">
                    <div class="col-lg-5 pt-md-4 align-self-center">
                        <div class="row localization-box px-lg-0 px-lg-5">
                            <div class="col map align-self-center p-0 animationSlideTop">
                            <iframe width="100%" height="100%" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Avenida%2011%20de%20Mar%C3%A7o%2C%202011%20-%20Aeroporto%2C%20Tiangu%C3%A1%20-%20CE%2C%2062320-000+(Pousada%20Serrana)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                    </div>
    
                        <div class="col-lg-5 py-5 p-md-5">
                            <div class="heading-section pt-md-5 pl-md-3 mb-5">
                                <div class="ml-md-0 animationSlideTop">
                                    <span class="subheading"><?php echo $localizacao['subtitulo']?></span>
                                    <h2 class="mb-4"><?php echo $localizacao['titulo']?></h2>
                                </div>
                            </div>
                            <div class="pb-md-5 pl-md-3 animationSlideTop">
                                <p><?php echo $localizacao['texto']?></p>
                            </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="acomodacoes">
                <div class="pb-5 px-md-5">
                    <div class="row pt-4">
                        <div class="col mt-3">
                            <div class="title-holder">
                                <h2 class="titleSection text-center mt-3 animationSlideTop">ACOMODAÇÕES
                                </h2>
                            </div>
                        </div>
                    </div>
    
                    <div class="row mt-3 justify-content-center">
                        <!-- STANDART -->
                        <div class="col-lg-4 col-md-9 col-sm-9 mt-5 px-4">
                            <div class="card shadow animationBouncy">
                                <div id="carouselStandart" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselStandart" data-slide-to="0" class="active"></li>
                                        <?php 
                                           foreach ($quartos['standart']['images'] as $key => $value) {
                                                if ($key == 0) continue;
                                                
                                                echo "<li data-target=\"#carouselStandart\" data-slide-to=\"$key\"></li>";
                                            } 
                                        ?>
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php
                                            $firstText2 = "<div class=\"carousel-item\"><img max-height=\"250px\" src=\"";
                                            $firstText = "<div class=\"carousel-item active\"><img max-height=\"250px\" src=\"";

                                            $endText = "\" class=\"d-block w-100\"></div>\n";

                                            foreach ($quartos['standart']['images'] as $key => $value) {
                                                $firstText = $key > 0? $firstText2:$firstText;

                                                echo $firstText.$value.$endText;
                                            }
                                        ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselStandart" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselStandart" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                               
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $quartos['standart']['nomeQuarto']?></h5>
                                    <p class="card-text mt-4 text-justify"><?php echo $quartos['standart']['descricao']?></p>
                                </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-air-conditioner"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1">AR CONDICIONADO</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-breakfast"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1">CAFÉ DA MANHÃ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-group"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['standart']['nPessoas']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-bed"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['standart']['camas']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-scale"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['standart']['area']?> m²</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-shower"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['standart']['banheiros']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top border-bottom">
                                            <div class="col">
                                                    <div class="media">
                                                        <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                        <div class="align-self-center center ml-2">
                                                            <span class="acomodacoes-icon flaticon-minibar"></span>
                                                        </div>
                                                        <div class="media-body mt-3">
                                                            <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                            <p class="ml-1">FRIGOBAR</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-coin"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1">R$ <?php echo $quartos['standart']['valor']?>,00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                
                                <div class="card-body">
                                    <button class="btn btn-check w-100" data-toggle="modal" data-target="#modalReservar" id="reservaStandart">RESERVE</button>
                                </div>
                            </div>
                        </div>

                        <!-- PREMIUM -->
                        <div class="col-lg-4 col-md-9 col-sm-9 mt-5 px-4">
                            <div class="card shadow animationBouncy">
                                <div id="carouselPremium" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselPremium" data-slide-to="0" class="active"></li>
                                            <?php 
                                                foreach ($quartos['premium']['images'] as $key => $value) {
                                                        if ($key == 0) continue;
                                                        
                                                        echo "<li data-target=\"#carouselPremium\" data-slide-to=\"$key\"></li>";
                                                    } 
                                            ?>
                                        </ol>
                                        <div class="carousel-inner">
                                            <?php
                                            
                                                $firstText2 = "<div class=\"carousel-item\"><img max-height=\"250px\" src=\"";
                                                $firstText = "<div class=\"carousel-item active\"><img max-height=\"250px\" src=\"";

                                                $endText = "\" class=\"d-block w-100\"></div>\n";


                                                foreach ($quartos['premium']['images'] as $key => $value) {
                                                    $firstText = $key > 0? $firstText2:$firstText;

                                                    echo $firstText.$value.$endText;
                                                }

                                            ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselPremium" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselPremium" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>    

                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $quartos['premium']['nomeQuarto']?></h5>
                                    <p class="card-text mt-4 text-justify"><?php echo $quartos['premium']['descricao']?></p>
                                </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-air-conditioner"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1">AR CONDICIONADO</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-breakfast"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1">CAFÉ DA MANHÃ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-group"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['premium']['nPessoas']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-bed"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['premium']['camas']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-scale"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['premium']['area']?> m²</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-shower"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['premium']['banheiros']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top border-bottom">
                                            <div class="col">
                                                    <div class="media">
                                                        <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                        <div class="align-self-center center ml-2">
                                                            <span class="acomodacoes-icon flaticon-minibar"></span>
                                                        </div>
                                                        <div class="media-body mt-3">
                                                            <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                            <p class="ml-1">FRIGOBAR</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-coin"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1">R$ <?php echo $quartos['premium']['valor']?>,00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                
                                <div class="card-body">
                                    <button class="btn btn-check w-100" data-toggle="modal" data-target="#modalReservar" id="reservaPremium">RESERVE</button>
                                </div>
                                </div>
                        </div>

                        <!-- DELUXE -->
                        <div class="col-lg-4 col-md-9 col-sm-9 mt-5 px-4">
                            <div class="card shadow animationBouncy">
                                
                                <div id="carouselDeluxe" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselDeluxe" data-slide-to="0" class="active"></li>
                                        <?php 
                                           foreach ($quartos['deluxe']['images'] as $key => $value) {
                                                if ($key == 0) continue;
                                                
                                                echo "<li data-target=\"#carouselDeluxe\" data-slide-to=\"$key\"></li>";
                                            } 
                                        ?>
                                    </ol>
                                    <div class="carousel-inner">

                                        <?php
                                        
                                            $firstText2 = "<div class=\"carousel-item\"><img max-height=\"250px\" src=\"";
                                            $firstText = "<div class=\"carousel-item active\"><img max-height=\"250px\" src=\"";

                                            $endText = "\" class=\"d-block w-100\"></div>\n";


                                            foreach ($quartos['deluxe']['images'] as $key => $value) {
                                                $firstText = $key > 0? $firstText2:$firstText;

                                                echo $firstText.$value.$endText;
                                            }

                                        ?>

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselDeluxe" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselDeluxe" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $quartos['deluxe']['nomeQuarto']?></h5>
                                    <p class="card-text mt-4 text-justify"><?php echo $quartos['deluxe']['descricao']?></p>
                                </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-air-conditioner"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1">AR CONDICIONADO</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-breakfast"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1">CAFÉ DA MANHÃ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-group"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['deluxe']['nPessoas']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-bed"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['deluxe']['camas']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top">
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start mr-3" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-scale"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['deluxe']['area']?> m²</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-shower"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1"><?php echo $quartos['deluxe']['banheiros']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row py-1 border-top border-bottom">
                                            <div class="col">
                                                    <div class="media">
                                                        <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                        <div class="align-self-center center ml-2">
                                                            <span class="acomodacoes-icon flaticon-minibar"></span>
                                                        </div>
                                                        <div class="media-body mt-3">
                                                            <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                            <p class="ml-1">FRIGOBAR</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col">
                                                <div class="media">
                                                    <!-- <img src="..." class="align-self-start" alt="..."> -->
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-coin"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <!-- <h5 class="mt-0">3 CAMAS</h5> -->
                                                        <p class="ml-1">R$ <?php echo $quartos['deluxe']['valor']?>,00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                
                                <div class="card-body">
                                    <button class="btn btn-check w-100" data-toggle="modal" data-target="#modalReservar" id="reservaDeluxe">RESERVE</button>
                                </div>
                                </div>
                        </div>
                        
                        </div>
                    </div> 
                
        </section>

        <section class="apresentacao py-5">
            <div class="px-4">
                <div class="row d-flex">
                    <div class="col-md-3 d-flex align-self-stretch">
                        <div class="py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center animationSlideRight">
                                <span class="flaticon-reception-bell"></span>
                            </div>
                        </div>
                        <div class="p-2 mt-2 animationBouncy">
                            <h3 class="heading mb-3">Reserve-se</h3>
                            <p><?php echo $apresentacao['reserve']?></p>
                        </div>
                        </div>      
                    </div>
                    <div class="col-md-3 d-flex align-self-stretch">
                        <div class="py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center animationSlideRight">
                                <span class="flaticon-serving-dish"></span>
                            </div>
                        </div>
                        <div class="p-2 mt-2 animationBouncy">
                            <h3 class="heading mb-3">Restaurante</h3>
                            <p><?php echo $apresentacao['restaurante']?></p>
                        </div>
                        </div>    
                    </div>
                    <div class="col-md-3 d-flex align-self-stretch">
                        <div class="py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center animationSlideLeft">
                                <span class="flaticon-car"></span>
                            </div>
                        </div>
                        <div class="p-2 mt-2 animationBouncy">
                            <h3 class="heading mb-3">Transporte</h3>
                            <p><?php echo $apresentacao['transporte']?></p>
                        </div>
                        </div>      
                    </div>
                    <div class="col-md-3 d-flex align-self-stretch">
                        <div class="py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center animationSlideLeft">
                                <span class="flaticon-spa"></span>
                            </div>
                        </div>
                        <div class="p-2 mt-2 animationBouncy">
                            <h3 class="heading mb-3">Suítes de Spa</h3>
                            <p><?php echo $apresentacao['spa']?></p>
                        </div>
                        </div>      
                    </div>
                </div>
            </div>
        </section>

        <section class="contato">
            <div class="container pb-5">
                <div class="row pt-4">
                    <div class="col mt-3">
                        <div class="title-holder animationSlideRight">
                            <h2 class="titleSection text-center mt-3">FALE CONOSCO</h2>
                        </div>
                    </div>
                </div> 

                <div class="row pt-4">
                    <div class="container">
                    <form class="pt-5 p-sm-5 animationSlideRight" id="formContato">
                        <div class="form-row pt-4">
                            <div class="form-group col-md-6">
                            <label for="inputNameContato">Nome</label>
                            <input type="text" class="form-control" id="inputNameContato" name="nome" placeholder="Digite o seu nome ...">
                            <small id="small-validar-nome-contato" class="ml-1" style="font-size: 0.7rem"></small>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmailContato">Email</label>
                            <input type="email" class="form-control" id="inputEmailContato" name="email" placeholder="Digite o seu email ...">
                            <small id="small-validar-email-contato" class="ml-1" style="font-size: 0.7rem"></small>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4 pt-4">
                            <label for="inputCidadeContato">Cidade</label>
                            <input type="text" name="cidade" class="form-control" id="inputCidadeContato" placeholder="Digite a sua cidade">
                            <small id="small-validar-cidade-contato" class="ml-1" style="font-size: 0.7rem"></small>
                            </div>
                            <div class="form-group col-md-4 pt-4">
                                <label for="inputEstadoContato">Estado</label>
                                <select id="inputEstadoContato" class="form-control" name="estado">
                                    <option>Acre (AC)</option>
                                    <option>Alagoas (AL)</option>
                                    <option>Amapá (AP)</option>
                                    <option>Amazonas (AM)</option>
                                    <option>Bahia (BA)</option>
                                    <option>Ceará (CE)</option>
                                    <option>Distrito Federal (DF)</option>
                                    <option>Espírito Santo (ES)</option>
                                    <option>Goiás (GO)</option>
                                    <option>Maranhão (MA)</option>
                                    <option>Mato Grosso (MT)</option>
                                    <option>Mato Grosso do Sul (MS)</option>
                                    <option>Minas Gerais (MG)</option>
                                    <option>Pará (PA)</option>
                                    <option>Paraíba (PB)</option>
                                    <option>Paraná (PR)</option>
                                    <option>Pernambuco (PE)</option>
                                    <option>Piauí (PI)</option>
                                    <option>Rio de Janeiro (RJ)</option>
                                    <option>Rio Grande do Norte (RN)</option>
                                    <option>Rio Grande do Sul (RS)</option>
                                    <option>Rondônia (RO)</option>
                                    <option>Roraima (RR)</option>
                                    <option>Santa Catarina (SC)</option>
                                    <option>São Paulo (SP)</option>
                                    <option>Sergipe (SE)</option>
                                    <option>Tocantins (TO)</option>
                                </select>
                                </div>
                                <div class="form-group col-md-4 pt-4">
                                <label for="inputAssuntoContato">Assunto</label>
                                <select id="inputAssuntoContato" class="form-control" name="assunto">
                                    <option value="Dúvida">Dúvida</option>
                                    <option value="Sugestão">Sugestão</option>
                                    <option value="Reclamação">Reclamação</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <textarea class="form-control" id="inputMensagem" name="mensagem" cols="30" rows="6" placeholder="Digite sua mensagem aqui ..."></textarea>
                            <small id="small-validar-mensagem-contato" class="ml-1" style="font-size: 0.7rem"></small>
                        </div>

                        <div class="form-group pt-4">
                            <div class="form-check">
                                <div class="custom-control custom-checkbox pl-2">
									<input class="custom-control-input" type="checkbox" id="concordouContato" checked>
									<label class="custom-control-label" for="concordouContato">
                                    Desejo receber informações sobre futuras promoções
									</label>
								</div>
                            </div>
                        </div>
                            
                        <div class="container-fluid pl-3 pr-3 m-0">
                            <div id="output-contato"></div>
                        </div>
                        <button type="submit" class="submit btn btn-check px-4 py-2 mt-3">ENVIAR</button>
                    </form>
                    </div>
                </div>

            </div>
        </section>

        <?php require $path.'_assets/footer.php'?>
    </div>

    <?php require $path.'_assets/modals.php'?>

    <!-- Modal editar usuários-->
		<div class="modal-edit modal fade" id="modalReservar" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="false">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">

				<div class="modal-content p-3 bg-light" id="modal-content01">
					<div class="modal-header">
						<h5 class="modal-title text-dark" id="TituloModalCentralizado">RESERVAR</h5>

						<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						
						<form method="POST" id="formReservar">

							<div class="form-row">

								<div class="form-group col-md-4">
									<label for="check-in-modal">Check-in</label>

                                    <input id="check-in-modal" class="form-control" type="date" name="checkIn">
                                    <small id="small-validar-checkIn" class="ml-1" style="font-size: 0.7rem"></small>
								</div>
							
								<div class="form-group col-md-4">
									<label for="check-out-modal">Check-out</label>

                                    <input id="check-out-modal" class="form-control" type="date" name="checkOut">
                                    <small id="small-validar-checkOut" class="ml-1" style="font-size: 0.7rem"></small>
								</div>

                                <div class="form-group col-md-2">
                                    <div class="form-group">
                                        <label for="quartos-modal">Quartos</label>
                                        <div class="form-group">
                                            <select id="quartos-modal" class="form-control" name="quartos">
                                                <option value="Standart">Standart</option>
                                                <option value="Premium">Premium</option>
                                                <option value="Deluxe">Deluxe</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
							
								<div class="form-group col-md-2">
									<label for="modalPessoas-modal">Pessoas</label>

									<div class="form-group">
                                        <select id="modalPessoas-modal" class="form-control" name="pessoas">
                                            <option value="1">1 Adulto</option>
                                            <option value="2">2 Adultos</option>
                                            <option value="3">3 Adultos</option>
                                            <option value="4">4 Adultos</option>
                                            <option value="5">5 Adultos</option>
                                        </select>
                                    </div>
                                </div>
                            
                            </div>

                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
									<label for="inputName">Nome</label>

									<input type="text" name="nome" class="form-control" id="inputName" placeholder="Jailson Ferreira Mendes" required>
									<small id="small-validar-nome" class="ml-1" style="font-size: 0.7rem"></small>
								</div>
							
								<div class="form-group col-md-6">
									<label for="inputEmail">E-mail</label>

									<input type="email" name="email" class="form-control" id="inputEmail" placeholder="exemplo@gmail.com" required>
									<small id="small-validar-email" class="ml-1" style="font-size: 0.7rem"></small>
								</div>

							</div>
							
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputTelefone">Telefone</label>

									<input type="tel" name="telefone" class="form-control" id="inputTelefone" placeholder="(88) 99999-9999" value="">
									<small id="small-validar-telefone" class="ml-1" style="font-size: 0.7rem"></small>
								</div>
							
								<div class="form-group col-md-6">
									<label for="inputCPF">CPF</label>

									<input type="text" name="cpf" class="form-control" id="inputCPF" placeholder="Jailson Ferreira Mendes" required>
									<small id="small-validar-cpf" class="ml-1" style="font-size: 0.7rem"></small>
								</div>
							</div>
							
							<div class="form-row">
                                <div class="form-group col-md-6">
									<label for="inputName">Cidade</label>

									<input type="text" name="cidade" class="form-control" id="inputCidade" placeholder="Jailson Ferreira Mendes" required>
									<small id="small-validar-cidade" class="ml-1" style="font-size: 0.7rem"></small>
								</div>

                                <div class="form-group col-md-4">
                                    <label for="inputState">Estado</label>
                                    <select id="inputState" class="form-control" name="estado">
                                        <option>Acre (AC)</option>
                                        <option>Alagoas (AL)</option>
                                        <option>Amapá (AP)</option>
                                        <option>Amazonas (AM)</option>
                                        <option>Bahia (BA)</option>
                                        <option>Ceará (CE)</option>
                                        <option>Distrito Federal (DF)</option>
                                        <option>Espírito Santo (ES)</option>
                                        <option>Goiás (GO)</option>
                                        <option>Maranhão (MA)</option>
                                        <option>Mato Grosso (MT)</option>
                                        <option>Mato Grosso do Sul (MS)</option>
                                        <option>Minas Gerais (MG)</option>
                                        <option>Pará (PA)</option>
                                        <option>Paraíba (PB)</option>
                                        <option>Paraná (PR)</option>
                                        <option>Pernambuco (PE)</option>
                                        <option>Piauí (PI)</option>
                                        <option>Rio de Janeiro (RJ)</option>
                                        <option>Rio Grande do Norte (RN)</option>
                                        <option>Rio Grande do Sul (RS)</option>
                                        <option>Rondônia (RO)</option>
                                        <option>Roraima (RR)</option>
                                        <option>Santa Catarina (SC)</option>
                                        <option>São Paulo (SP)</option>
                                        <option>Sergipe (SE)</option>
                                        <option>Tocantins (TO)</option>
                                    </select>
                                </div>
							</div>
							
							<div class="form-check mt-3">
								<div class="custom-control custom-checkbox pl-2">
									<input class="custom-control-input" type="checkbox" id="receberEmails" checked>
									<label class="custom-control-label" for="receberEmails">
										Quero receber e-mails de promoções futuras
									</label>
								</div>
							</div>
							
                            <div class="modal-footer col-12 pt-4" id="buttons-edit" data-id="">
                                <div class="container-fluid pl-3 pr-3 m-0">
                                    <div id="output-edit"></div>
                                </div>

                                <div id="valor" class="alert alert-success mt-3">R$00,00</div>
        
                                <button type="submit" class="submit btn btn-check px-5 py-2" id="btn-edit-form" for="editForm">Reservar</button>
        
                            </div>
						</form>
						
					</div>

				</div>
			</div>
		</div>
    
    <script src="<?php echo $path.'_includes/jquery-3.3.1.min.js'?>"></script>
    <script src="<?php echo $path.'_includes/popper-1.14.4.min.js'?>"></script>
    <script src="<?php echo $path.'_includes/bootstrap-4.1.3.min.js'?>"></script>

    <script src="./_includes/jquery.inputmask-4.min.js"></script>
    <script src="./_js/form.js"></script>
    <script src="./_ajax/ajax-index.js"></script>

    <script src="./_js/creating-objects.js"></script>
    <script src="./_js/index.js"></script>
    <script src="./_js/header.js"></script>
    <script src="./_js/footer.js"></script>

</body>
</html>