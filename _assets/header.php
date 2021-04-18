<!-- INCLUDES  -->
<!-- VARIÁVEIS -->

	<!-- INCLUDE BOOTSTRAP CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo $path.'_includes/bootstrap-4.1.3.min.css'?>">

	<!-- INCLUDE PERSONALIZADO -->
	<link rel="stylesheet" type="text/css" href="<?php echo $path.'_css/header-style.min.css'?>">

<!-- FIM INCLUDES -->

<header>
	<!-- NAV -->
	<nav class="style-nav transparent navbar navbar-dark navbar-expand-md w-100 fixed-top" id="header">
		<a class="navbar-brand" href="<?php echo $path.'index.php'?>"><img class="logo logo2" src="<?php echo $geral['icon_dark']?>" alt="Pousada Serrana"></a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="style-collapse collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" id="home">Home</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" id="reserve">Reserve</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" id="localizacao">Localização</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" id="acomodacoes">Acomodações</a>
				</li>


				<li class="nav-item">
					<a class="nav-link" id="contato">Contato</a>
				</li>

			</ul>

		</div>
	</nav>
	<!-- END NAV -->
</header>

