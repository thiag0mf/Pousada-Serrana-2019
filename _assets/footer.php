<link rel="stylesheet" href="<?php echo $path.'_css/footer.min.css'?>">

<footer class="footer">

    <div class="container pt-3">
    <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#servicos">
        Launch demo modal
        </button> -->
        <div class="row pt-5">
            <div class="col-md-3 col-sm-6 animationSlideTop">
                <h5 class="">Pousada Serrana</h5>

                 <ul class="pt-5">
                    <li class="">
                        <a href="<?php echo $dados['facebook']?>">
                            <span class="icon icon-facebook"></span>
                            <span class="">Facebook</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo $dados['instagram']?>">
                            <span class="icon icon-instagram"></span>
                            <span class="">Instagram</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo $dados['booking']?>">
                            <span class="icon socicon-booking"></span>
                            <span class="">Booking</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo $dados['airbnb']?>">
                            <span class="icon socicon-airbnb"></span>
                            <span class="">Airbnb</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6 animationSlideTop">
                <h5 class="">Links úteis</h5>
                <ul class="pt-5">
                    <li class="">
                        <span class="text"><a href="" data-toggle="modal" data-target="#ganheCupons">Ganhe Cupons</a></span>
                    </li>

                    <li class="">
                        <span class="text"><a href="" data-toggle="modal" data-target="#promocoes">Promoções</a></span>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6 animationSlideTop">
                <h5 class="">Privacidade</h5>
                <ul class="pt-5">
                    <li class="">
                        <span class="text"><a href="" data-toggle="modal" data-target="#servicos">Serviços</a></span>
                    </li>

                    <li class="">
                        <span class="text"><a href="" data-toggle="modal" data-target="#sobreNos">Sobre nós</a></span>
                    </li>

                    <li class="">
                        <span class="text"><a href="" data-toggle="modal" data-target="#termosUso">Termos de uso</a></span>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6 animationSlideTop">
                <h5 class="">Dúvidas?</h5>
                <ul class="pt-5">
                    <li class="">
                        <span class="icon icon-map-marker"></span>
                        <span class="text"><?php echo $dados['endereco']?></span>
                    </li>

                    <li class="">
                        <span class="icon icon-phone"></span>
                        <span class="text"><?php echo $dados['telefone']?></span>
                    </li>
                    <li class="">
                        <span class="icon icon-envelope"></span>
                        <span class="text"><?php echo $dados['email']?></span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row justify-content-around pb-5">
            <div class="col-5 col-md-2 col-sm-4">
                <img class="img-fluid" src="<?php echo $path.'_images/_logos/new2-logo.png'?>">
            </div>

            <div class="col-5 col-md-2 col-sm-4">
                <img class="img-fluid" src="<?php echo $path.'_images/_logos/gdc-logo.png'?>">
            </div>
        </div>

    </div>
</footer>