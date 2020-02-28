<?php
include_once '../lib/Constantes.Class.php';
include_once '../modelo/Alumno.class.php';
include_once '../modelo/AlumnoMapper.php';

$Mapper = new AlumnoMapper();
$Alumno = new Alumno($Mapper->findById($_GET['id']));
$Alumno->setDiagnosticos($Mapper->findDiagnosticos($Alumno->getId()));
?>

<html>
    <head>
        <meta charset="UTF-8">
        <?php include_once '../lib/includesCss.php'; ?>
        <?php include_once '../lib/includesJs.php'; ?>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Gesti&oacute;n de Alumnos</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-9">

                    <div class="card">
                        <div class="card-header">
                            <h5><span class="oi oi-person"></span> Datos del Alumno</h5>
                        </div>
                        <div class="card-body">

                            <img src="../lib/manitos.png" style="background-color: snow; -webkit-border-radius: 50% !important; -moz-border-radius: 50% !important;  border-radius: 50% !important; border: none; margin-right: 20px" width="200" class="rounded float-left img-fluid img-thumbnail" alt="...">

                            <!-- Div Datos Personales -->
                            <div class="form-group">
                                <div class="form-row">
                                    <label for="nombre">Datos Personales</label> 
                                </div>
                                <div class="form-row">
                                    <div class="col-6">                                        
                                        <small id="nombreHelp" class="form-text text-muted">Nombre Completo</small>                   
                                        <p><?= $Alumno->getNombre(); ?></p>
                                    </div>
                                    <div class="col-2">                                        
                                        <small id="anio_ingresoHelp" class="form-text text-muted">A&ntilde;o de ingreso</small>                   
                                        <p><?= $Alumno->getAnio_Ingreso(); ?></p>
                                    </div>
                                    <div class="col-2">                                        
                                        <small id="dniHelp" class="form-text text-muted">DNI</small>                   
                                        <p><?= $Alumno->getDni(); ?></p>
                                    </div>
                                    <div class="col-2">                                        
                                        <small id="cudHelp" class="form-text text-muted">CUD</small>                   
                                        <p><?= $Alumno->getCud(); ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr />

                            <!-- Div Datos de Contacto -->
                            <div class="form-group">
                                <div class="form-row">
                                    <label for="email">Datos de Contacto</label> 
                                </div>
                                <div class="form-row">
                                    <div class="col-8">                                        
                                        <small id="emailHelp" class="form-text text-muted">Correo electr&oacute;nico</small>                   
                                        <p><?= $Alumno->getEmail(); ?></p>
                                    </div>
                                    <div class="col-4">                                        
                                        <small id="telefonoHelp" class="form-text text-muted">N&uacute;mero de tel&eacute;fono</small>                   
                                        <p><?= $Alumno->getTelefono(); ?></p>
                                    </div>
                                </div>
                            </div>            
                            <hr />

                            <!-- Menu tabulado -->
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabDiagnosticos" data-toggle="tab" href="#tab-Diagnosticos" role="tab" aria-controls="tab-Diagnosticos" aria-selected="true">Diagnosticos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabFamiliares" data-toggle="tab" href="#tab-Familiares" role="tab" aria-controls="tab-Familiares" aria-selected="false">Grupo Familiar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabAcademico" data-toggle="tab" href="#tab-Academico" role="tab" aria-controls="tab-Academico" aria-selected="false">Historial Academico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabEntrevistas" data-toggle="tab" href="#tab-Entrevistas" role="tab" aria-controls="tabE-ntrevistas" aria-selected="false">Entrevistas</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <!-- Tab Diagnosticos -->                                
                                <div class="tab-pane fade show active" id="tab-Diagnosticos" role="tabpanel" aria-labelledby="tabDiagnosticos">
                                    <p></p>
                                    <h5>Diagnosticos 
                                        <a href="alumno_diagnostico.crear.php?id_alumno=<?= $Alumno->getId(); ?>">
                                            <button class="btn btn-success float-right"><i class="oi oi-plus">&nbsp;</i> Crear Nuevo</button>
                                        </a>
                                    </h5>
                                    <p></p>

                                    <?php if($Alumno->getDiagnosticos()) { ?>
                                    <table class="table table-striped small table-bordered border-success">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Diagnostico</th>
                                                <th>Profesional</th>
                                                <th style="text-align: center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($Alumno->getDiagnosticos() as $Diagnostico) { ?>
                                                <tr>
                                                    <td><?= $Diagnostico->getDiagnostico(); ?></td>
                                                    <td><?= $Diagnostico->getProfesional_diagnostico(); ?></td>
                                                    <td style="text-align: center">

                                                        <!-- Ini Botones Opciones -->
                                                        <a title="Eliminar" href="alumno_diagnostico.eliminar.php?id=<?= $Diagnostico->getId(); ?>&id_alumno=<?= $Diagnostico->getId_alumno(); ?>" onclick="return confirm('¿Desea realmente eliminar?');">
                                                            <button type="button" class="btn btn-outline-danger">
                                                                <span class="oi oi-trash"></span>
                                                            </button></a>
                                                        <!-- Fin Botones Opciones -->

                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <?php } ?>
                                    

                                    <p></p>
                                </div>

                                <!-- Tab grupo Familiar -->
                                <div class="tab-pane fade" id="tab-Familiares" role="tabpanel" aria-labelledby="tabFamiliares">
                                    Grupo Familiar
                                </div>

                                <!-- Tab Historial Académico -->
                                <div class="tab-pane fade" id="tab-Academico" role="tabpanel" aria-labelledby="tabAcademico">
                                    Historial Académico
                                </div>

                                <!-- Tab Entrevistas -->
                                <div class="tab-pane fade" id="tab-Entrevistas" role="tabpanel" aria-labelledby="tabEntrevistas">
                                    Entrevistas
                                </div>
                            </div>                            


                        </div>
                    </div>
                </div>

                <div class="col-md-3">


                    <div class="card">
                        <div class="card-header text-white bg-info">
                            <h5 ><span class="oi oi-cog"></span> Opciones</h5>
                        </div>

                        <div class="card-body">
                            <div class="list-group">
                                <a href="alumno.actualizar.php?id=<?= $Alumno->getId(); ?>" class="list-group-item list-group-item-action"><span class="oi oi-pencil"></span> Actualizar Datos</a>
                                <a href="#" class="list-group-item list-group-item-action"><span class="oi oi-document"></span> Descargar Reporte</a>
                                <a href="alumnos.php" class="list-group-item list-group-item-action"><span class="oi oi-home"></span> Volver a Alumnos</a>
                            </div>                            
                        </div>
                    </div>                    
                    <hr />

                    <?php include_once '../gui/bloqueUsuarioLogueado.php'; ?>
                </div>
            </div>

        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>