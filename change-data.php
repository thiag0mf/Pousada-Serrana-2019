<?php 
	//IDENTIFICAR QUAL É O CAMINHO PARA O INDEX:
    $path = '';
    while (file_exists($path.'index.php') == false) {
        $path = $path.'../';
    }

	require $path.'_sql/sql_functions.php';
	
	require_once './_session/session_verify.php';
	$_SESSION['ultima_pagina'] = 'change-data.php';
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
	<link rel="stylesheet" href="./_css/change-data.min.css">

	<link rel="stylesheet" href="./_css/animation-admin.min.css">

	<link rel="stylesheet" href="<?php echo $path.'_fonts/flaticon/font/flaticon.css'?>">
	<link rel="stylesheet" href="<?php echo $path.'./_fonts/socicon/style.css'?>">

	<link rel="stylesheet" href="<?php echo $path.'./_fonts/ionicons/css/ionicons.min.css'?>">
    <link rel="stylesheet" href="<?php echo $path.'./_fonts/icomoon/icomoon.css'?>">
    <link rel="stylesheet" href="<?php echo $path.'./_fonts/open-iconic/open-iconic-bootstrap.min.css'?>">

</head>
<body class="bg-dark">

	<div class="container-fluid mb-5"> 

		<div class="row justify-content-end" id="row-root">
			
			<?php require './_assets/menu-admin.php'; ?>

			<div class="col-xl-10">
				<div class="text-light px-5">

					<div class="row table-dark shadow-light mt-5 p-3">
						<div class="col-2 my-2">
							<button type="button" class="btn btn-outline-warning btn-collapse" data-toggle="collapse" data-target="#collapseGeral" aria-expanded="false" aria-controls="collapseGeral">GERAL</button>
						</div>
						
						<div class="col-2 my-2">
							<button type="button" class="btn btn-outline-warning btn-collapse" data-toggle="collapse" data-target="#collapseHome" aria-expanded="false" aria-controls="collapseHome">HOME</button>
						</div>

						<div class="col-2 my-2">
							<button type="button" class="btn btn-outline-warning btn-collapse" data-toggle="collapse" data-target="#collapseReserve" aria-expanded="false" aria-controls="collapseReserve">RESERVE</button>
						</div>

						<div class="col-2 my-2">
							<button type="button" class="btn btn-outline-warning btn-collapse" data-toggle="collapse" data-target="#collapseLocalizacao" aria-expanded="false" aria-controls="collapseLocalizacao">LOCALIZAÇÃO</button>
						</div>

						<div class="col-4 my-2">
							<button type="button" class="btn btn-outline-warning btn-collapse" data-toggle="collapse" data-target="#collapseStandart" aria-expanded="false" aria-controls="collapseStandart">ACOMODAÇÕES - QUARTO STANDART</button>
						</div>

						<div class="col-4 my-2">
							<button type="button" class="btn btn-outline-warning btn-collapse" data-toggle="collapse" data-target="#collapsePremium" aria-expanded="false" aria-controls="collapsePremium">ACOMODAÇÕES - QUARTO PREMIUM</button>
						</div>

						<div class="col-4 my-2">
							<button type="button" class="btn btn-outline-warning btn-collapse" data-toggle="collapse" data-target="#collapseDeluxe" aria-expanded="false" aria-controls="collapseDeluxe">ACOMODAÇÕES - QUARTO DELUXE</button>
						</div>

						<div class="col-2 my-2">
							<button type="button" class="btn btn-outline-warning btn-collapse" data-toggle="collapse" data-target="#collapseApresentacao" aria-expanded="false" aria-controls="collapseApresentacao">APRESENTAÇÃO</button>
						</div>

						<div class="col-2 my-2">
							<button type="button" class="btn btn-outline-warning btn-collapse" data-toggle="collapse" data-target="#collapseRodape" aria-expanded="false" aria-controls="collapseRodape">RODAPÉ</button>
						</div>
					</div>

					<!-- GERAL -->
					<div class="collapse" id="collapseGeral">
						<div class="card shadow-light animationBouncy table-dark mt-5">
							<div class="card-body table-dark">
								<h5 class="card-title text-center text-light titleSection">GERAL</h5>
							</div>
									
							<div class="card-body table-dark">
								<form method="post" action="./_sql/sql_functions_change_data.php" enctype="multipart/form-data" id="formGeral">
									<input type="hidden" name="option" value="geral" />

									<div class="form-row mt-2">
										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Imagem de Favicon</h5>
												</div>

												<div class="row align-items-center">
													<div class="col"></div>
													<div class="col align-self-center">
														<img src="<?php echo $geral['favicon']; ?>" alt="Quartos" class="card-img-top card-img-favicon">
													</div>
													<div class="col"></div>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
																<input type="file" accept="image/*" class="custom-file-input" id="faviconImage" name="faviconImage">
																<label class="custom-file-label" id="label-imagem" for="faviconImage">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Logo Principal</h5>
												</div>

												<img src="<?php echo $geral['icon_dark'];?>" alt="Quartos" class="card-img-top">

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
																<input type="file" accept="image/*" class="custom-file-input" id="logoPrincipal" name="logoPrincipal">
																<label class="custom-file-label" id="label-imagem" for="logoPrincipal">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Logo Clara</h5>
												</div>

												<img src="<?php echo $geral['icon_light'];?>" alt="Quartos" class="card-img-top">

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
																<input type="file" accept="image/*" class="custom-file-input" id="logoClara" name="logoClara">
																<label class="custom-file-label" id="label-imagem" for="logoClara">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-end mt-4 mb-3">
										<!-- <div class="col"></div> -->
										<div class="align-self-end mr-4">
											<button class="btn btn-outline-warning px-3" type="submit">Salvar Mudanças</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- HOME -->
					<div class="collapse" id="collapseHome">
						<div class="card shadow-light animationBouncy table-dark mt-5">
							<div class="card-body table-dark">
								<h5 class="card-title text-center text-light titleSection">HOME</h5>
							</div>
									
							<div class="card-body table-dark">
								<form method="post" action="./_sql/sql_functions_change_data.php" enctype="multipart/form-data" id="formHome">
									<input type="hidden" name="option" value="home" />

									<div class="form-row mt-2">
										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Imagem de Fundo</h5>
												</div>
												<div class="row align-items-center">
													<div class="col align-self-center">
														<img src="<?php echo $capa['bgImagem']; ?>" alt="Quartos" class="card-img-top">
													</div>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
																<input type="file" accept="image/*" class="custom-file-input" id="imagemFundo" name="imagemFundo">
																<label class="custom-file-label" id="label-imagem" for="imagemFundo">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Título</h5>
												</div>

												<h3 id="titleImg"><?php echo $capa['titulo'];?></h3>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="homeTitulo" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Subtítulo</h5>
												</div>

												<h3 class="subtitleImg"><?php echo $capa['subtitulo'];?></h3>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="homeSubtitulo" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-end mt-4 mb-3">
										<!-- <div class="col"></div> -->
										<div class="align-self-end mr-4">
											<button class="btn btn-outline-warning px-3" type="submit">Salvar Mudanças</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- RESERVE -->
					<div class="collapse" id="collapseReserve">
						<div class="card shadow-light animationBouncy table-dark mt-5">
							<div class="card-body table-dark">
								<h5 class="card-title text-center text-light titleSection">RESERVE</h5>
							</div>
									
							<div class="card-body table-dark">
								<form method="post" action="./_sql/sql_functions_change_data.php" enctype="multipart/form-data" id="formReserve">
									<input type="hidden" name="option" value="reserve" />
									<div class="form-row mt-2">
										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Imagem de Check-In</h5>
												</div>
												<div class="row align-items-center">
													<div class="col align-self-center">
														<img src="<?php echo $reserva['check-in']; ?>" alt="Quartos" class="card-img-top">
													</div>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
																<input type="file" accept="image/*" class="custom-file-input" id="imagemCheckIn" name="imagemCheckIn">
																<label class="custom-file-label" id="label-imagem" for="imagemCheckIn">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Imagem de Check-Out</h5>
												</div>
												<div class="row align-items-center">
													<div class="col align-self-center">
														<img src="<?php echo $reserva['check-out'] ?>" alt="Quartos" class="card-img-top">
													</div>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
																<input type="file" accept="image/*" class="custom-file-input" id="imagemCheckOut" name="imagemCheckOut">
																<label class="custom-file-label" id="label-imagem" for="imagemCheckOut">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Imagem de Quartos</h5>
												</div>
												<div class="row align-items-center">
													<div class="col align-self-center">
														<img src="<?php echo $reserva['quartos']; ?>" alt="Quartos" class="card-img-top">
													</div>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
																<input type="file" accept="image/*" class="custom-file-input" id="imagemQuartos" name="imagemQuartos">
																<label class="custom-file-label" id="label-imagem" for="imagemQuartos">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Imagem de Clientes</h5>
												</div>
												<div class="row align-items-center">
													<div class="col align-self-center">
														<img src="<?php echo $reserva['clientes']; ?>" alt="Quartos" class="card-img-top">
													</div>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
																<input type="file" accept="image/*" class="custom-file-input" id="imagemClientes" name="imagemClientes">
																<label class="custom-file-label" id="label-imagem" for="imagemClientes">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>

									<div class="row justify-content-end mt-4 mb-3">
										<!-- <div class="col"></div> -->
										<div class="align-self-end mr-4">
											<button class="btn btn-outline-warning px-3" type="submit">Salvar Mudanças</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- LOCALIZAÇÃO -->
					<div class="collapse" id="collapseLocalizacao">
						<div class="card shadow-light animationBouncy table-dark mt-5">
							<div class="card-body table-dark">
								<h5 class="card-title text-center text-light titleSection">LOCALIZAÇÃO</h5>
							</div>
									
							<div class="card-body table-dark">
								<form method="post" action="./_sql/sql_functions_change_data.php" enctype="multipart/form-data" id="formLocalizacao">
									<input type="hidden" name="option" value="localizacao" />

									<div class="form-row mt-2">
										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Imagem de Fundo</h5>
												</div>
												<div class="row align-items-center">
													<div class="col align-self-center">
														<img src="<?php echo $localizacao['bgImagem']; ?>" alt="Quartos" class="card-img-top">
													</div>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
																<input type="file" accept="image/*" class="custom-file-input" id="localizacaoImagemFundo" name="localizacaoImagemFundo">
																<label class="custom-file-label" for="localizacaoImagemFundo">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Título</h5>
												</div>

												<h3 class="px-3 text-center"><?php echo $localizacao['titulo']?></h3>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="localizacaoTitulo" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Subtítulo</h5>
												</div>

												<h3 class="subheading px-3 text-center"><?php echo $localizacao['subtitulo'];?></h3>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="localizacaoSubtitulo" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 p-3">
											<div class="card bg-dark shadow pb-4">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Texto</h5>
												</div>

												<p class="p-3"><?php echo $localizacao['texto'];?></p>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<textarea  class="form-control" name="localizacaoTexto" id="localizacaoTexto" rows="3" placeholder="Digite aqui o novo texto ..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-end mt-4 mb-3">
										<!-- <div class="col"></div> -->
										<div class="align-self-end mr-4">
											<button class="btn btn-outline-warning px-3" type="submit">Salvar Mudanças</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- ACOMODAÇÕES - QUARTO STANDART -->
					<div class="collapse" id="collapseStandart">
						<div class="card shadow-light animationBouncy table-dark mt-5">
							<div class="card-body table-dark">
								<h5 class="card-title text-center text-light titleSection">ACOMODAÇÕES - QUARTO <?php echo strtoupper($quartos['standart']['nomeQuarto']);?></h5>
							</div>
									
							<div class="card-body table-dark">
								<form method="post" action="./_sql/sql_functions_change_data.php" enctype="multipart/form-data" id="formQuartoStandart">
									<input type="hidden" name="option" value="quartoStandart" />

									<div class="form-row mt-2">

										<?php
											foreach ($quartos['standart']['images'] as $key => $value) {

												$id = $quartos['standart']['idImages'][$key];
												$nImage = $key + 1;
												
												echo "<div class=\"col-sm-4 p-3\">
												<div class=\"card bg-dark shadow\">
													<div class=\"card-header bg-warning\">
														<h5 class=\"text-center card-change-data-title\">Imagem de Fundo $nImage</h5>
													</div>
													<div class=\"row align-items-center\">
														<div class=\"col align-self-center\">
															<img src=\"$value\" alt=\"Quartos\" class=\"card-img-top\">
														</div>
													</div>
		
													<div class=\"card-body text-light border-top\">
														<div class=\"form-group\">
															<div class=\"form-group\">
																<div class=\"custom-file\">
																	<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"10485760\"/>
																	<input type=\"file\" accept=\"image/*\" class=\"custom-file-input\" id=\"imagemStandart$nImage\" name=\"imagensStandart[]\" multiple\">
																	<label class=\"custom-file-label\" id=\"label-imagem\" for=\"imagemStandart$nImage\">Escolher imagem</label>
																	<input type=\"hidden\" name=\"idImagemStandart[]\" value=\"$id\"/ multiple>
																</div>
															</div>
														</div>
		
														<div class=\"row px-3\">
															<button class=\"btn-excluir-img btn btn-outline-warning px-3 w-100\" data-image=\"standart\" data-id=\"$id\">Excluir Imagem</button>
														</div>
													</div>
												</div>
											</div>";
											}
										?>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Adicionar Imagem</h5>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="file" accept="image/*" class="custom-file-input" id="newImagemStandart" name="newImagemStandart">
																<label class="custom-file-label" id="label-imagem" for="newImagemStandart">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Pessoas</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-group"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['standart']['nPessoas']?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoPessoasStandart" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Camas</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-bed"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['standart']['camas']?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoCamasStandart" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Banheiros</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-shower"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['standart']['banheiros']?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoBanheiroStandart" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Metros Quadrados</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-scale"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['standart']['area']?> m²</p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoAreaStandart" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Preço</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-coin"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center">R$ <?php echo $quartos['standart']['valor']?>,00</p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoValorStandart" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 p-3">
											<div class="card bg-dark shadow pb-4">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Texto</h5>
												</div>

												<p class="p-4"><?php echo $quartos['standart']['descricao'];?></p>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<textarea  class="form-control" name="quartoTextoStandart" rows="3" placeholder="Digite aqui o novo texto ..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-end mt-4 mb-3">
										<!-- <div class="col"></div> -->
										<div class="align-self-end mr-4">
											<button class="btn btn-outline-warning px-3" type="submit">Salvar Mudanças</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- ACOMODAÇÕES - QUARTO PREMIUM -->
					<div class="collapse" id="collapsePremium">
						<div class="card shadow-light animationBouncy table-dark mt-5">
							<div class="card-body table-dark">
								<h5 class="card-title text-center text-light titleSection">ACOMODAÇÕES - QUARTO <?php echo strtoupper($quartos['premium']['nomeQuarto']);?></h5>
							</div>
									
							<div class="card-body table-dark">
								<form method="post" action="./_sql/sql_functions_change_data.php" enctype="multipart/form-data" id="formQuartoPremium">
									<input type="hidden" name="option" value="quartoPremium" />
								
									<div class="form-row mt-2">

										<?php
											foreach ($quartos['premium']['images'] as $key => $value) {

												$id = $quartos['premium']['idImages'][$key];
												$nImage = $key + 1;
												
												echo "<div class=\"col-sm-4 p-3\">
												<div class=\"card bg-dark shadow\">
													<div class=\"card-header bg-warning\">
														<h5 class=\"text-center card-change-data-title\">Imagem de Fundo $nImage</h5>
													</div>
													<div class=\"row align-items-center\">
														<div class=\"col align-self-center\">
															<img src=\"$value\" alt=\"Quartos\" class=\"card-img-top\">
														</div>
													</div>
		
													<div class=\"card-body text-light border-top\">
														<div class=\"form-group\">
															<div class=\"form-group\">
																<div class=\"custom-file\">
																	<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"10485760\"/>
																	<input type=\"file\" accept=\"image/*\" class=\"custom-file-input\" id=\"imagemPremium$nImage\" name=\"imagensPremium[]\" multiple\">
																	<label class=\"custom-file-label\" id=\"label-imagem\" for=\"imagemPremium$nImage\">Escolher imagem</label>
																	<input type=\"hidden\" name=\"idImagemPremium[]\" value=\"$id\"/ multiple>
																</div>
															</div>
														</div>
		
														<div class=\"row px-3\">
															<button class=\"btn-excluir-img btn btn-outline-warning px-3 w-100\" data-image=\"premium\" data-id=\"$id\">Excluir Imagem</button>
														</div>
													</div>
												</div>
											</div>";
											}
										?>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Adicionar Imagem</h5>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="file" accept="image/*" class="custom-file-input" id="newImagemPremium" name="newImagemPremium">
																<label class="custom-file-label" id="label-imagem" for="newImagemPremium">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Pessoas</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-group"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['premium']['nPessoas']?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoPessoasPremium" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Camas</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-bed"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['premium']['camas']?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoCamasPremium" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Banheiros</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-shower"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['premium']['banheiros']?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoBanheiroPremium" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Metros Quadrados</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-scale"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['premium']['area']?> m²</p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoAreaPremium" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Preço</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-coin"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center">R$ <?php echo $quartos['premium']['valor']?>,00</p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoValorPremium" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 p-3">
											<div class="card bg-dark shadow pb-4">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Texto</h5>
												</div>

												<p class="p-4"><?php echo $quartos['premium']['descricao'];?></p>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<textarea  class="form-control" name="quartoTextoPremium" rows="3" placeholder="Digite aqui o novo texto ..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-end mt-4 mb-3">
										<!-- <div class="col"></div> -->
										<div class="align-self-end mr-4">
											<button class="btn btn-outline-warning px-3" type="submit">Salvar Mudanças</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- ACOMODAÇÕES - QUARTO DELUXE -->
					<div class="collapse" id="collapseDeluxe">
						<div class="card shadow-light animationBouncy table-dark mt-5">
							<div class="card-body table-dark">
								<h5 class="card-title text-center text-light titleSection">ACOMODAÇÕES - QUARTO <?php echo strtoupper($quartos['deluxe']['nomeQuarto']);?></h5>
							</div>
									
							<div class="card-body table-dark">
								<form method="post" action="./_sql/sql_functions_change_data.php" enctype="multipart/form-data" id="formQuartoDeluxe">
									<input type="hidden" name="option" value="quartoDeluxe" />

									<div class="form-row mt-2">

										<?php
											foreach ($quartos['deluxe']['images'] as $key => $value) {

												$id = $quartos['deluxe']['idImages'][$key];
												$nImage = $key + 1;
												
												echo "<div class=\"col-sm-4 p-3\">
												<div class=\"card bg-dark shadow\">
													<div class=\"card-header bg-warning\">
														<h5 class=\"text-center card-change-data-title\">Imagem de Fundo $nImage</h5>
													</div>
													<div class=\"row align-items-center\">
														<div class=\"col align-self-center\">
															<img src=\"$value\" alt=\"Quartos\" class=\"card-img-top\">
														</div>
													</div>
		
													<div class=\"card-body text-light border-top\">
														<div class=\"form-group\">
															<div class=\"form-group\">
																<div class=\"custom-file\">
																	<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"10485760\"/>
																	<input type=\"file\" accept=\"image/*\" class=\"custom-file-input\" id=\"imagemDeluxe$nImage\" name=\"imagensDeluxe[]\" multiple\">
																	<label class=\"custom-file-label\" id=\"label-imagem\" for=\"imagemDeluxe$nImage\">Escolher imagem</label>
																	<input type=\"hidden\" name=\"idImagemDeluxe[]\" value=\"$id\"/ multiple>
																</div>
															</div>
														</div>
		
														<div class=\"row px-3\">
															<button class=\"btn-excluir-img btn btn-outline-warning px-3 w-100\" data-image=\"deluxe\" data-id=\"$id\">Excluir Imagem</button>
														</div>
													</div>
												</div>
											</div>";
											}
										?>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Adicionar Imagem</h5>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="file" accept="image/*" class="custom-file-input" id="newImagemDeluxe" name="newImagemDeluxe">
																<label class="custom-file-label" id="label-imagem" for="newImagemDeluxe">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Pessoas</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-group"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['deluxe']['nPessoas']?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoPessoasDeluxe" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Camas</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-bed"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['deluxe']['camas']?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoCamasDeluxe" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Banheiros</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-shower"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['premium']['banheiros']?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoBanheiroDeluxe" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Metros Quadrados</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-scale"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $quartos['deluxe']['area']?> m²</p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoAreaDeluxe" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Preço</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
                                                        <span class="acomodacoes-icon flaticon-coin"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center">R$ <?php echo $quartos['deluxe']['valor']?>,00</p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="number" class="form-control" name="quartoValorDeluxe" placeholder="Digite aqui o novo número ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 p-3">
											<div class="card bg-dark shadow pb-4">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Texto</h5>
												</div>

												<p class="p-4"><?php echo $quartos['deluxe']['descricao'];?></p>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<textarea  class="form-control" name="quartoTextoDeluxe" rows="3" placeholder="Digite aqui o novo texto ..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-end mt-4 mb-3">
										<!-- <div class="col"></div> -->
										<div class="align-self-end mr-4">
											<button class="btn btn-outline-warning px-3" type="submit">Salvar Mudanças</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- APRESENTAÇÃO -->
					<div class="collapse" id="collapseApresentacao">
						<div class="card shadow-light animationBouncy table-dark mt-5">
							<div class="card-body table-dark">
								<h5 class="card-title text-center text-light titleSection">APRESENTAÇÃO</h5>
							</div>
									
							<div class="card-body table-dark">
								<form method="post" action="./_sql/sql_functions_change_data.php" enctype="multipart/form-data" id="formApresentacao">
									<input type="hidden" name="option" value="apresentacao" />

									<div class="form-row mt-2">
										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Imagem de Fundo</h5>
												</div>
												<div class="row align-items-center">
													<div class="col align-self-center">
														<img src="<?php echo $apresentacao['bgImagem']; ?>" alt="Quartos" class="card-img-top">
													</div>
												</div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
																<input type="file" accept="image/*" class="custom-file-input" id="imagemFundoApresentacao" name="imagemFundoApresentacao">
																<label class="custom-file-label" id="label-imagem" for="imagemFundoApresentacao">Escolher imagem</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Reserve-se</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
														<span class="flaticon-reception-bell"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-justify px-4"><?php echo $apresentacao['reserve'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="reserveTexto" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Restaurante</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
														<span class="flaticon-serving-dish"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-justify px-4"><?php echo $apresentacao['restaurante'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="restauranteTexto" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Transporte</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
														<span class="flaticon-car"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-justify px-4"><?php echo $apresentacao['transporte'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="transporteTexto" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Spa</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
														<span class="flaticon-spa"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-justify px-4"><?php echo $apresentacao['spa'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="spaTexto" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-end mt-4 mb-3">
										<!-- <div class="col"></div> -->
										<div class="align-self-end mr-4">
											<button class="btn btn-outline-warning px-3" type="submit">Salvar Mudanças</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- RODAPÉ -->
					<div class="collapse" id="collapseRodape">
						<div class="card shadow-light animationBouncy table-dark mt-5">
							<div class="card-body table-dark">
								<h5 class="card-title text-center text-light titleSection">RODAPÉ</h5>
							</div>
									
							<div class="card-body table-dark">
								<form method="post" action="./_sql/sql_functions_change_data.php" enctype="multipart/form-data" id="formRodape">
									<input type="hidden" name="option" value="rodape" />

									<div class="form-row mt-2">
										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Link do Facebook</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
													<span class="icon icon-facebook"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $dados['facebook'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="rodapeLinkFacebook" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Link do Instagram</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
													<span class="icon icon-instagram"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $dados['instagram'];?></p>
                                                    </div>
                                                </div>
												

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="rodapeLinkInstagram" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Link do Booking</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
													<span class="icon socicon-booking"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $dados['booking'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="rodapeLinkBooking" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-3 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Link do AirBnb</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
													<span class="icon socicon-airbnb"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $dados['airbnb'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="rodapeLinkAirbnb" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 p-3">
											<div class="card bg-dark shadow pb-4">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Ganhe Cupons</h5>
												</div>

												<p class="p-4"><?php echo $linksUteis['cupons'];?></p>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<textarea  class="form-control" name="rodapeGanheCupons" rows="3" placeholder="Digite aqui o novo texto ..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 p-3">
											<div class="card bg-dark shadow pb-4">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Promoções</h5>
												</div>

												<p class="p-4"><?php echo $linksUteis['promocoes'];?></p>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<textarea  class="form-control" name="rodapePromocoes" rows="3" placeholder="Digite aqui o novo texto ..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 p-3">
											<div class="card bg-dark shadow pb-4">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Serviços</h5>
												</div>

												<p class="p-4"><?php echo $privacidade['servicos'];?></p>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<textarea  class="form-control" name="rodapeServicos" rows="3" placeholder="Digite aqui o novo texto ..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 p-3">
											<div class="card bg-dark shadow pb-4">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Sobre Nós</h5>
												</div>

												<p class="p-4"><?php echo $privacidade['sobreNos'];?></p>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<textarea  class="form-control" name="rodapeSobreNos" rows="3" placeholder="Digite aqui o novo texto ..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 p-3">
											<div class="card bg-dark shadow pb-4">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Termos de Uso</h5>
												</div>

												<ol class="py-3">

													<?php

														foreach ($privacidade['termosUso'] as $key => $value) {

															$id = $privacidade['termosUsoId'][$key];
															$texto = utf8_encode($value);

															echo "<li class=\"mb-3\">$texto<button data-id=\"$id\" type=\"button\" class=\"btn btn-link remover-termo\">Remover Termo</button></li>";
														}

													?>

												</ol>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<textarea  class="form-control" name="rodapeTermosUso" rows="3" placeholder="Digite aqui mais um termo de uso ..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Endereço</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
													<span class="icon icon-map-marker"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $dados['endereco'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="rodapeEndereco" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">Telefone</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
													<span class="icon icon-phone"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $dados['telefone'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="rodapeTelefone" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4 p-3">
											<div class="card bg-dark shadow">
												<div class="card-header bg-warning">
													<h5 class="text-center card-change-data-title">E-mail</h5>
												</div>

												<div class="media">
                                                    <div class="align-self-center center ml-2">
													<span class="icon icon-envelope"></span>
                                                    </div>
                                                    <div class="media-body mt-3">
                                                        <p class="text-center"><?php echo $dados['email'];?></p>
                                                    </div>
                                                </div>

												<div class="card-body text-light border-top">
													<div class="form-group">
														<div class="form-group">
															<div class="custom-file">
																<input type="text" class="form-control" name="rodapeEmail" placeholder="Digite aqui o novo título ...">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>

									<div class="row justify-content-end mt-4 mb-3">
										<!-- <div class="col"></div> -->
										<div class="align-self-end mr-4">
											<button class="btn btn-outline-warning px-3" type="submit">Salvar Mudanças</button>
										</div>
									</div>
								</form>
							</div>
						</div>
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
	<script src="./_ajax/ajax-edit-admin.js"></script>
	<script src="./_js/change-data.js"></script>
	<script src="./_ajax/ajax-change-data.js"></script>

	<!-- Previne da página reenviar dados quando atualizada -->
	<script>
		if ( window.history.replaceState )
			window.history.replaceState( null, null, window.location.href );
	</script>

</body>
</html>