<?php 
	//IDENTIFICAR QUAL É O CAMINHO PARA O INDEX:
    $path = '';
    while (file_exists($path.'index.php') == false) {
        $path = $path.'../';
    }

	require $path.'_sql/sql_functions.php';

	require $path.'_sql/delete_obsolete_reservas.php';
	
	require_once './_session/session_verify.php';
	$_SESSION['ultima_pagina'] = 'admin-mensagens-contato.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<title>Administrador</title>
	
	<!-- FAVICON -->
    <link href="<?php echo $geral['favicon']; ?>" rel="icon">

    <link rel="stylesheet" href="./_includes/bootstrap-4.1.3.min.css">
	<link rel="stylesheet" href="./_css/admin.min.css">
	<link rel="stylesheet" href="./_css/menu-admin.min.css">

	<link rel="stylesheet" href="./_css/animation-admin.min.css">
</head>
<body class="bg-dark">

	<div class="container-fluid mb-5"> 

		<div class="row justify-content-end" id="row-root">
			
			<?php require './_assets/menu-admin.php'; ?>

			<div class="col-xl-10 box-animation">
                <div class="p-4">
                    <div class="w-100 pt-3 table-dark pb-3 shadow-light">
                        <h5 class="card-title text-center text-light titlePage">CAIXA DE ENTRADA</h5>
                    </div>

					<table class=" table table-dark table-bordered table-hover shadow-lg border mt-4">
						<thead class="text-dark text-center">
							<tr class="bg-warning">
								<th>Nome</th>
								<th>Email</th>
								<th>Cidade</th>
								<th>UF</th>
								<th>Assunto</th>
								<th>Mensagem</th>
								<th class="text-center border-left">#</th>
							</tr>
						</thead>

						<tbody class="tbody-dark corpoTabela">
							

						</tbody>

					</table>
				</div>
			</div>

		</div>

	</div>

	<!-- Modal editar usuários-->
	<div class="modal-edit modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="false">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">

				<div class="modal-content p-3 table-dark" id="modal-content01">
					<div class="modal-header text-warning">
						<h5 class="modal-title" id="TituloModalCentralizado">Enviar Mensagem</h5>

						<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body text-light table-dark">
						
						<form method="POST" id="formEnviarEmail">

							<div class="form-row">
								<div class="form-group col-12">
									<label for="inputAssunto">Assunto</label>

									<input type="text" name="assunto" class="form-control" id="inputAssunto" placeholder="Assunto do email ..." required>
									<small id="small-validar-assunto" class="ml-1" style="font-size: 0.7rem"></small>
								</div>

							</div>

							<div class="form-group">
								<label for="inputMensagem">Mensagem</label>
								<textarea class="form-control" id="inputMensagem" name="mensagem" cols="30" rows="6" placeholder="Digite sua mensagem aqui ..."></textarea>
								<small id="small-validar-mensagem-contato" class="ml-1" style="font-size: 0.7rem"></small>
							</div>
							
							<div class="modal-footer col-12 pt-4" id="buttons-edit" data-id="">
								<div class="container-fluid pl-3 pr-3 m-0">
									<div id="output-edit"></div>
								</div>
							
								<button type="button" class="btn btn-outline-warning" data-dismiss="modal">Fechar</button>
								<button type="submit" class="submit btn btn-outline-warning" id="btn-edit-form" for="editForm">Salvar mudanças</button>
							
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>

	
	
	
		<!-- INCLUDES -->
    <script src="./_includes/jquery-3.3.1.min.js"></script>
    <script src="./_includes/jquery.inputmask-4.min.js"></script>
    <script src="./_includes/popper-1.14.4.min.js"></script>
    <script src="./_includes/bootstrap-4.1.3.min.js"></script>
	<script src="./_js/form.js"></script>
	<script src="./_ajax/ajax-edit-admin.js"></script>
	<script src="./_ajax/ajax-caixa-de-entrada.js"></script>

	<script src="./_animations/animation-admin-tabela.js"></script>

	<!-- Previne da página reenviar dados quando atualizada -->
	<script>
		if ( window.history.replaceState )
			window.history.replaceState( null, null, window.location.href );
	</script>

</body>
</html>