<?php 
    require_once './_session/session_start.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Administrador</title>

    <link rel="stylesheet" href="./_includes/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="./_css/admin-login.min.css">
</head>
<body>

    <!-- 
    USUÁRIO: admin123
    SENHA: admin123 
    -->

    <div class="container-fluid p-4" id="container">

        <div class="card p-0 border-0 shadow-lg col-xl-3 col-lg-4 col-md-5 col-sm-7 mt-5 mr-sm-4 float-right" id="card">
            <div class="card-header text-center text-dark bg-warning">
                <h6>LOGIN</h6>
            </div>

            <div class="card-body table-dark p-4">
                <form method="post">
                    <div class="form-row mt-4">
                        <div class="form-group col-12">
                            <!-- <label for="inputName">Usuário</label> -->
                            <input type="text" name="nome" class="form-control" id="inputName" placeholder="Digite seu nome de usuário ..." required>
                            <small id="small-validar-nome" class="ml-1" style="font-size: 0.7rem"></small>
                        </div>
                    </div> <!-- END FORM ROW-->

                    <div class="form-row mt-2">
                        <!-- <label for="inputPassword">Senha</label> -->

                        <div class="input-group" id="input-group-password">   
                            <input type="password" name="senha" class="form-control" id="inputPassword" placeholder="Digite sua senha ..." required>
                            
                            <div class="input-group-append" id="passwordButton">
                                <button class="btn input-group-text" type="button" id="toggle-password-view">
                                    <img src="./_icons/eye.svg">
                                </button>
                            </div>
                        </div>

                        <small id="small-validar-senha" class="ml-1" style="font-size: 0.7rem"></small>
                    </div> <!-- END FORM ROW-->
                    
                    <div class="form-group">

                        <div class="form-check mt-5">
                            <div class="custom-control custom-checkbox pl-1">
                                <input class="custom-control-input" name="manterLogado" type="checkbox" id="manterLogado" value="1">
                                <label class="custom-control-label" for="manterLogado">
                                    Mantenha-me logado!
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <button type="submit" class="submit btn btn-warning mt-2 pr-4 pl-4" id="entrar">ENTRAR</button>
                    </div>

                </form>

            </div> <!-- END CARD BODY -->

            <div class="card-footer bg-warning">
                <div class="row">
                    <div class="col col-12">
                        <a class="float-right text-dark p-2" href="#" id="esqueceuSenha">Esqueceu a senha?</a>
                    </div>
                </div>

            </div> <!-- END CARD FOOTER -->

        </div>  <!-- END CARD -->

    </div> <!-- END CONTAINER -->

    <script src="./_includes/jquery-3.3.1.min.js"></script>
    <script src="./_includes/jquery.inputmask-4.min.js"></script>
    <script src="./_includes/popper-1.14.4.min.js"></script>
    <script src="./_includes/bootstrap-4.1.3.min.js"></script>
    <script src="./_js/form.js"></script>
    <script src="./_js/admin-login.js"></script>

    <script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
    </script>
</body>
</html>