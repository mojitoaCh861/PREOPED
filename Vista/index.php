<?php
include_once '../lib/ControlAcceso.Class.php';
$existeUser = true;
if (!$Usuario || ($Usuario && !$Usuario->id)) {
    $existeUser = false;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <?php include_once '../lib/includesCss.php'; ?>
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/uargflow_footer.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>        
        <meta name="google-signin-client_id" content="356408280239-7airslbg59lt2nped9l4dtqm2rf25aii.apps.googleusercontent.com" />
        <script type="text/javascript" src="https://apis.google.com/js/platform.js" async defer></script>
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/login.js" ></script> 
        <title><?php echo Constantes::NOMBRE_SISTEMA; ?> - Login</title>
    </head>
    <body onload="onLibraryLoaded(<?= $existeUser ?>)" > 

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                    <img src="../lib/logopreoped.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    <?php echo Constantes::NOMBRE_SISTEMA; ?> - Login
                </a>
            </div>
        </nav>

        <p>&nbsp;</p>
        <div class="container">
            <section id="main-content">
                <article>
                    <div class="card">
                        <div class="card-header">
                            <h3> <?php echo Constantes::NOMBRE_SISTEMA; ?> - Login</h3>
                        </div>
                        <div class="card-body">

                            <h5>Bienvenido</h5>
                            <p>Estimado usuario: Bienvenido a la aplicaci&oacute;n PREOPEDigital, una aplicaci&oacute;n desarrollada en la UARG - UNPA.</p>

                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <div class="row vertical-align">
                                            <div class="col-1 text-center">
                                                <i class="oi oi-info"></i> 
                                            </div>
                                            <div class="col-11">
                                                <strong>Importante:</strong> Para acceder al sistema es necesario disponer de un correo de <a href="http://www.gmail.com" target="_blank">GMail</a>.
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                            </div>                              


                            <hr />
                            <h5>Ingreso al Sistema</h5>
                            <p>Ud. puede ingresar el sistema si est&aacute; conectado a su e-mail. Por favor haga click en el bot&oacute;n a continuaci&oacute;n y elija su cuenta o realice el login.</p>
                            <div id="googleCustomBtn" class="customGPlusSignIn" onclick="onSignInClicked()">
                                <span class="googleIcon"></span>
                                <span class="googleButtonText">Iniciar Sesión</span>
                            </div>

                        </div>
                    </div>
                </article>
            </section>
        </div>
        <footer class="footer">
            PREOPEDigital
            <span class="oi oi-globe"></span> 
            UNPA-UARG
        </footer>
    </body>
</html>

