<?php 
    require_once './_session/session_verify.php';
    $_SESSION['ultima_pagina'] = 'admin-email-send.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviar email</title>

    <link rel="stylesheet" href="./_includes/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="./_includes/jquery-ui.min.css">
    <link rel="stylesheet" href="./_css/admin.min.css">
    <link rel="stylesheet" href="./_css/animation-admin.min.css">
    <link rel="stylesheet" href="./_css/menu-admin.min.css">
</head>
<body class="bg-dark">

	<div class="container-fluid mb-5"> 

		<div class="row justify-content-end" id="row-root">
			
			<?php require './_assets/menu-admin.php'; ?>

			<div class="col-xl-10 px-5 pt-3" id="col-table">

                <form method="POST" id="formMensagem" class="form-animation table-dark shadow p-0 mt-3">
                    <h4 id="title" class="h4 text-dark bg-warning font-weight-normal text-center py-2">ENVIAR EMAIL</h4>
                    <div class="form-content-animation">
                        <div class="p-5">
                            <div class="form-row mt-2">
                                <div class="form-group col-md-4">

                                    <label class="labelRadio" for="selecionarTodos">Todos</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input id="selecionarTodos" type="radio" name="escolheSelect" class="radioSelect" checked>
                                            </div>
                                        </div>
                                        <div class="form-control" aria-label="Input text com botão radio" id="inputTodos">Enviar e-mail para todos</div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">

                                    <label class="labelRadio" for="selecionarTipo">Por tipo</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <input id="selecionarTipo" type="radio" name="escolheSelect" class="radioSelect">
                                            </div>
                                        </div>
                                     
                                        <div class="form-control dropdown px-0" id="dropdownSexo">
                                            <div class="dropdown-toggle text-left px-3" id="dropTipo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,5">
                                                Selecione os tipos ... &emsp;&emsp;&emsp; 
                                            </div>

                                            <div class="dropdown-menu dropdown-menu-right p-0 d-none" aria-labelledby="dropSexo" id="menuDropTipo">
                                                <label for="checkReservaAtiva" class="item-sexo dropdown-item my-0 py-2 pt-3">
                                                    <input class="mr-2" type="checkbox" id="checkReservaAtiva" name="checkTipo">
                                                        Clientes com Reserva Ativa
                                                </label>

                                                <label for="checkSemReserva" class="item-sexo dropdown-item my-0 py-2">
                                                    <input class="mr-2" type="checkbox" id="checkSemReserva" name="checkTipo">
                                                    Clientes sem Reserva Ativa
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">

                                    <label class="labelRadio" for="selecionarIndividual">Individual</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <input id="selecionarIndividual" type="radio" name="escolheSelect" class="radioSelect">
                                            </div>
                                        </div>

                                        <div class="form-control dropdown dropright p-0" id="dropdownIndividual">
                                            <div class="dropdown-toggle p-0" id="dropIndividual" data-toggle="dropdown" aria-expanded="false" data-offset="-2, 38">
                                                <input class="border-0 form-control" type="search" name="emails" id="emails" placeholder="Pesquisar ..."> 
                                            </div>

                                            <div class="bg-warning dropdown-menu dropdown-menu-right p-0" aria-labelledby="dropIndividual" id="logIndividual">
                                                <h5 class="dropdown-header">Selecionados:</h5>
                                                <div id="log"></div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>

                            <div class="form-row mt-2">
                                <div class="form-group col-12">
                                    <label for="assunto">Assunto</label>
                                    <input type="text" name="assunto" class="form-control" id="assunto" placeholder="Digite o assunto ..." required>
                                    <small id="small-validar-assunto" class="ml-1" style="font-size: 0.7rem"></small>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="mensagem">Mensagem</label>
                                    <textarea class="form-control" name="mensagem" id="mensagem" rows="5" placeholder="Digite sua mensagem ..." required></textarea>
                                    <small id="small-validar-mensagem" class="ml-1" style="font-size: 0.7rem"></small>
                                </div>
                            </div>
                            

                            <div class="row justify-content-end">
                                <button type="button" class="btn btn-warning mt-2 pr-4 pl-4" id="enviarMensagem">ENVIAR</button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>

         <!-- MODAL DE OUTPUT -->
         <div class="modal fade" tabindex="-1" id="modal-output">
            <div class="modal-dialog">
                <div class="modal-content text-light" id="output-modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-light" id="modal-titulo"></h5>

                        <button class="close" id="close" type="button" data-dismiss="modal"><span aria-hidden="true">&times</span></button>
                    </div>

                    <div class="modal-body" id="output">
                    
                    </div>

                </div>
            </div>
        </div>

	</div>

    <!-- INCLUDES -->
    <script src="./_includes/jquery-3.3.1.min.js"></script>
    <script src="./_includes/jquery.inputmask-4.min.js"></script>
    <script src="./_includes/popper-1.14.4.min.js"></script>
    <script src="./_includes/bootstrap-4.1.3.min.js"></script>
    <script src="./_includes/jquery-ui.min.js"></script>
    
    <script src="./_ajax/ajax-admin-email-send.js"></script>
    <script src="./_animations/animation-menu-form.js"></script>
    <script src="./_ajax/ajax-edit-admin.js"></script>
    

	<!-- Previne da página reenviar dados quando atualizada -->
	<script>
		if ( window.history.replaceState )
			window.history.replaceState( null, null, window.location.href );
	</script>

</body>
</html>