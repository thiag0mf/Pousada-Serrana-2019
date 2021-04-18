<?php 
	//IDENTIFICAR QUAL É O CAMINHO PARA O INDEX:
    $path = '';
    while (file_exists($path.'index.php') == false) {
        $path = $path.'../';
    }

	require $path.'_sql/sql_functions.php';

	require $path.'_sql/delete_obsolete_reservas.php';
	
	require_once './_session/session_verify.php';
	$_SESSION['ultima_pagina'] = 'admin.php';
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
                        <h5 class="card-title text-center text-light titlePage">RESERVAS</h5>
                    </div>

					<table class="table table-dark table-bordered table-hover shadow-lg border mt-5">
						<thead class="text-dark text-center">
							<tr class="bg-warning">
								<th>Nome</th>
								<th>CPF</th>
								<th>Telefone</th>
								<th>E-mail</th>
								<th>Cidade</th>
								<th>UF</th>
								<th>Quarto</th>
								<th>Pes.</th>
								<th>Valor</th>
								<th>Check-in</th>
								<th>Check-out</th>
								<th class="text-center border-left">#</th>
							</tr>
						</thead>

						<tbody class="tbody-dark corpoTabela">
							<!-- //FROM HERE -->

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
						<h5 class="modal-title" id="TituloModalCentralizado">Editar Informações</h5>

						<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body text-light table-dark">
						
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
									<label for="inputName">CPF</label>

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
									<input class="custom-control-input" type="checkbox" id="receberEmails">
									<label class="custom-control-label" for="receberEmails">
										Quero receber e-mails de promoções futuras
									</label>
								</div>
							</div>
							
							<div class="modal-footer col-12 pt-4" id="buttons-edit" data-id="">
								<div class="container-fluid pl-3 pr-3 m-0">
									<div id="output-edit"></div>
								</div>
								<button id="valor" data-valor="" class="alert alert-success mt-3">R$00,00</button>
							
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
	<script src="./_ajax/ajax-admin.js"></script>
	<script src="./_ajax/ajax-edit-admin.js"></script>

	<script src="./_animations/animation-admin-tabela.js"></script>

	<!-- Previne da página reenviar dados quando atualizada -->
	<script>
		if ( window.history.replaceState )
			window.history.replaceState( null, null, window.location.href );
	</script>

</body>
</html>