<?php
include_once '../modelo/EntrevistaMapper.php';
include_once '../modelo/Entrevista.class.php';
$Mapper = new EntrevistaMapper();
?>
<p></p>
<h5>Entrevistas 
    <a href="alumno_entrevista.crear.php?id_alumno=<?= $Alumno->getId(); ?>">
        <button class="btn btn-success float-right"><i class="oi oi-plus">&nbsp;</i> Crear Nuevo</button>
    </a>
</h5>
<p></p>

<table class="table table-striped small table-bordered border-success">
    <thead class="thead-light">
        <tr>
            <th>Fecha</th>
            <th>Entrevistador</th>
            <th style="text-align: center">Opciones</th> <!-- vista ampliada con modal -->
        </tr>
    </thead>
    <tbody>
        <?php
        if ($Alumno->getEntrevistas())
            foreach ($Alumno->getEntrevistas() as $Entrevista) {
                //var_dump($Entrevista);
        ?>
                <tr>
                    <td><?= $Entrevista->getFecha(); ?></td>
                    <td><?= $Entrevista->getEntrevistador(); ?></td>
                    <td style="text-align: center">

                        <!-- Ini Botones Opciones -->
                        <a title="Ver detalle" href="#">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal<?= $Entrevista->getId_entrevista(); ?>">
                                <span class="oi oi-zoom-in"></span>
                            </button></a>
                        <!-- @todo eliminar entrevista -->
                        <a title="Eliminar" href="alumno_entrevista.eliminar.php?id=<?= $Entrevista->getId_entrevista(); ?>" onclick="return confirm('¿Desea realmente eliminar?');">
                            <button type="button" class="btn btn-outline-danger">
                                <span class="oi oi-trash"></span>
                            </button></a>
                        <!-- Fin Botones Opciones -->

                        <?php
                        $EntrevistaA = new Entrevista($Mapper->findById($Entrevista->getId_entrevista()));
                        $EntrevistaA->setEntrevistados($Mapper->findEntrevistados($EntrevistaA->getId()));
                        $Entrevistados = $EntrevistaA->getEntrevistados();
                        ?>
                        <!-- Ini Modal -->
                        <div class="modal fade" id="modal<?= $Entrevista->getId_entrevista(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Entrevista</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped table-bordered border-success">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Entrevistador</th>
                                                    <th>Fecha</th>
                                                    <th>Entrevistados</th>
                                                    <th>Conclusion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $EntrevistaA->getEntrevistador(); ?></td>
                                                    <td><?= $EntrevistaA->getFecha(); ?></td>
                                                    <td><?php foreach ($Entrevistados as $entrevistado) { ?><?= $entrevistado->getNombre(); ?>, <?php } ?></td>
                                                    <td><?= $EntrevistaA->getConclusiones(); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>                                                                    
                                </div>
                            </div>
                        </div>
                        <!-- Fin Modal -->

                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<p></p>
