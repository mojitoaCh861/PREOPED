<?php
include_once '../lib/Constantes.Class.php';

include_once '../modelo/Alumno.class.php';
include_once '../modelo/AlumnoMapper.php';

$Objeto = new Alumno($_POST);
$Mapper = new AlumnoMapper();
$idObjetoCreado = $Mapper->update($Objeto);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Objetos</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5 class="oi oi-plus"> Actualizar Objeto</h5>
                </div>
                <div class="card-body">
                    <?php include_once '../gui/excepcion.mensajes.php'; ?>
                </div>
                <div class="card-footer">
                    <p>Opciones:</p>
                    <p><a href="alumno.ver.php?id=<?= $Objeto->getId(); ?>"><input class="btn btn-outline-danger" value="Salir" /></a></p>
                </div>
            </div>   
            <div class="row">&nbsp;</div>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>