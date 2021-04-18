			<div class="col-2 table-dark d-none d-xl-block p-0" id="aside-menu">

				<div class="card h-100" id="card">

					<div class="card-header">
						<div class="row justify-content-center align-items-center">
							<div class="col">
								<img class="img rounded-circle" id="imagem" src="
								<?php 
									echo file_exists($_SESSION['profile_img'])?$_SESSION['profile_img']:"./_images/sem-imagem-avatar.png";
								?>">
							</div>

							<div class="col" id="divTexto">
								<a href="admin.php" class="text-light"><h6>@<?php echo $_SESSION['login'] ?></h6></a>
							</div>
						</div>
					</div>

					<div class="card-body p-1 pt-4">
						<a class="btn btn-link text-warning" type="link" href="admin.php">Home</a><br>

						<a class="btn btn-link text-warning" type="link" href="admin-mensagens-contato.php">Caixa de entrada</a>

						<a class="btn btn-link text-warning" type="link" href="change-data.php">Alterar Informações do Site</a>
					
						<a class="btn btn-link text-warning" type="link" href="admin-email-send.php">Enviar e-mail</a>

						<button class="btn btn-link text-warning" type="button" data-toggle="modal" data-target="#modalEditAdmin">Alterar Imagem</button>

					</div>

					<div class="card-footer">
						<div class="row p-3" id="btn-group-bottom">
							<a class="col align-self-end btn btn-outline-warning shadow-lg mr-2" id="logout" href="admin.php?logout=true">Logout</a>

							<button class="col align-self-end btn btn-outline-primary shadow-lg" id="update" >Atualizar</button>
						</div>
					</div>

				</div>
				
			</div>

		<!-- Modal editar administrador -->
		<div class="modal fade" tabindex="-1" role="dialog" id="modalEditAdmin">

			<div class="modal-dialog" role="document">

				<div class="modal-content" id="modal-content-imagem">
					<div class="modal-header text-warning">
						<h5 class="modal-title">Alterar imagem</h5>
						<button type="button" class="close" id="close" data-dismiss="modal" aria-label="Fechar">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body text-light">
						<form method="post" action="./_sql/sql_functions-edit-admin.php" enctype="multipart/form-data" id="formEditAdmin">
								
							<div class="custom-file">
								<input type="file" accept="image/*" class="custom-file-input" id="customFile" name="imagem">
								<label class="custom-file-label" id="label-imagem" for="customFile">Escolher imagem</label>
							</div>

						</form>
						<div id="id123"></div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-warning" data-dismiss="modal">Fechar</button>
						<button type="submit" class="submit btn btn-outline-warning" id="btn-edit-admin">Salvar mudanças</button>
					</div>
				</div>

			</div>

		</div>