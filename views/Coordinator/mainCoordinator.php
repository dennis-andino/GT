<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tutorias</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Tutorias</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Tutorias programadas</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="tutoriastbl" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Asignatura</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>tutor</th>
                                    <th>Ver</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if (isset($tutorials)) {
                                    while ($onetutorial = $tutorials->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td><?= $onetutorial->id ?></td>
                                            <td><?= $onetutorial->coursename ?></td>
                                            <td><?= $onetutorial->reservdate ?></td>
                                            <td><?= $onetutorial->schedule ?></td>
                                            <td><?= $onetutorial->tutor ?></td>
                                            <td>
                                                <?php
                                                if($onetutorial->status==-1){ ?><!-- -1 pendiente , 0 en proceso, 1 aprobado/programada ,2 finalizado,3 denegado -->
                                                <form action="<?= base_url . 'tutorials/getinfo' ?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idtutorial" name="idtutorial" value="<?= $onetutorial->id ?>">
                                                    <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Reprogramar"><i class="fas fa-edit"></i></button>
                                                </form>
                                                <?php
                                                }elseif($onetutorial->status==1){?><!-- programada -->
                                                <form action="<?= base_url . 'tutorials/getinfo' ?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idtutorial" name="idtutorial" value="<?= $onetutorial->id ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reprogramar"><i class="far fa-clock"></i></button>
                                                </form>
                                                <?php
                                                }elseif($onetutorial->status==0){ ?> <!-- en progreso -->
                                                <form action="<?= base_url . 'tutorials/getinfo' ?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idtutorial" name="idtutorial" value="<?= $onetutorial->id ?>">
                                                    <button class="btn btn-success btn-sm " data-toggle="tooltip" data-placement="top" title="Ahora mismo en proceso">
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    </button>
                                                </form>
                                                <?php
                                                }elseif ($onetutorial->status==2){ ?><!-- en finalizada -->
                                                <form action="<?= base_url . 'tutorials/getinfo' ?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idtutorial" name="idtutorial" value="<?= $onetutorial->id ?>">
                                                    <button type="submit" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Tutoria Finalizada"><i class="fas fa-check-double"></i></button>
                                                </form>
                                                <?php
                                                }else{ ?><!-- Cancelada -->
                                                <form action="<?= base_url . 'tutorials/getinfo' ?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idtutorial" name="idtutorial" value="<?= $onetutorial->id ?>">
                                                    <button type="submit" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Tutoria Cancelada"><i class="fas fa-ban"></i></button>
                                                </form>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <?php
                if (isset($_SESSION['tutoria'])){ ?>
                <div class="col-lg-5">
                    <div class="card card-primary">
                        <div class="card-header text-left">
                            <h5 class="m-0">Solicitud #<?=$_SESSION['tutoria']['id']?> &nbsp;
                                <?php
                                if($_SESSION['tutoria']['status']==-1){ ?>
                                    <span class="badge badge-pill badge-warning">Pendiente de aprobar</span>
                                    <?php
                                }elseif($_SESSION['tutoria']['status']==1){ ?>
                                    <span class="badge badge-pill badge-success">Aprobada</span>
                                    <?php
                                }elseif ($_SESSION['tutoria']['status']==3){ ?>
                                    <span class="badge badge-pill badge-danger">Cancelada</span>
                                    <?php
                                }elseif ($_SESSION['tutoria']['status']==0){?>
                                    <span class="badge badge-pill badge-info">Ahora mismo ejecutandose</span>
                                    <?php
                                }elseif($_SESSION['tutoria']['status']==2){?>
                                    <span class="badge badge-pill badge-secondary">Finalizada</span>
                                    <?php
                                }
                                ?>
                                <div class="float-right">
                                    <?php
                                    if($_SESSION['tutoria']['status']==-1){?>
                                            <button class="btn btn-success btn-sm"  data-toggle="modal" data-target="#addsection"><i class="fas fa-check-square"></i></button>
                                        <button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#canceltut"><i class="far fa-window-close"></i></button>
                                        <form action="<?=base_url . 'tutorials/delete'?>" method="POST" style="display: inline-block;">
                                            <input type="hidden" id="idtutdelete" name="idtutdelete" value="<?= $_SESSION['tutoria']['id'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar Tutoria"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <table class="table table-sm">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Solicitante:</th>
                                        <td><?= $_SESSION['tutoria']['studentname'] ?></td>
                                        <th scope="row">Solicitada el:</th>
                                        <td><?=$_SESSION['tutoria']['requestdate'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Asignada a :</th>
                                        <td><?= $_SESSION['tutoria']['tutorname'] ?></td>
                                        <th scope="row">Programada para:</th>
                                        <td><?= $_SESSION['tutoria']['reservdate'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Horario:</th>
                                        <td><?= $_SESSION['tutoria']['schedule'] ?></td>
                                        <th scope="row">Curso:</th>
                                        <td><?= $_SESSION['tutoria']['coursename'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Asunto:</th>
                                        <td colspan="3"><?= $_SESSION['tutoria']['subject'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4">Descripcion:</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="card-body">
                                                <?= $_SESSION['tutoria']['details'] ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php if($_SESSION['tutoria']['filename']!='0'):?>
                                        <tr>
                                            <th scope="row">Adjuntos:</th>
                                            <td colspan="3"><a href="../uploads/documents/<?=$_SESSION['tutoria']->filename?>" class="badge badge-light"><?= $_SESSION['tutoria']->filename ?></a></td>
                                        </tr>
                                    <?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th colspan="3" style="background-color: #EBF5FB;">
                                        <div align='center'><h6><strong>Lista de Asistentes</strong></h6>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">asistencia</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                if (isset($_SESSION['members'])){
                                    $members = $_SESSION['members'];
                                    foreach ($members as $member){?>
                                        <tr>
                                            <td><?= $member['alias'] ?></td>
                                            <td><?= $member['phone'] ?></td>
                                            <td>
                                                <input type="checkbox" name="asistentes[]" value="<?= $member['id'] ?>" autocomplete="off" <?php if ($member['assistance'] == 1) {echo 'checked';} ?> disabled>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                                <!--0 en proceso, 1 aprobado/programada ,2 finalizado,3 denegado  -->
                            </table>
                            <?php
                            if ($_SESSION['tutoria']['status'] == -1 || $_SESSION['tutoria']['status'] == 1 ) { ?>
                                <form action="<?= base_url . 'tutorials/reconfigure' ?>" method="post">
                                    <input type="hidden" name="idtutorial" value="<?=$_SESSION['tutoria']['id']?>">
                                    <table class="table table-bordered table-hover table-sm">
                                        <thead>
                                        <tr>
                                            <th colspan="2" style="background-color: #EBF5FB;">
                                                <div align='center'><h6><strong>Reprogramación</strong></h6> </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Asignatura :</th>
                                            <td>
                                                <select id="asignatura" name="asignatura" class="form-control form-control-sm" required>
                                                    <option value="" selected>Seleccione un curso</option>
                                                    <?php
                                                    if (isset( $_SESSION['asignatures'])) {
                                                        foreach ($_SESSION['asignatures'] as $asignatura ) { ?>
                                                            <option value="<?= $asignatura['id'] ?>"><?= $asignatura['coursename'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Horario :</th>
                                            <td>
                                                <select id="horario" name="horario" class="form-control form-control-sm" required>
                                                    <option value="" selected>Seleccione un Horario</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= $_SESSION['tutoria']['modality'] == 0 ? 'Aula :' : 'Enlace :' ?></th>
                                            <td>
                                                <?php if ($_SESSION['tutoria']['modality'] == 0): ?>
                                                    <select name="sect_edit" class="form-control form-control-sm" required>
                                                    <?php
                                                    foreach ($_SESSION['sections'] as $section){ ?>
                                                        <option><?= $section['description'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                        <option selected><?=$_SESSION['tutoria']['space']?></option>
                                                </select>
                                                <?php else: ?>
                                                    <input type="text" name="sect_edit" value="<?=$_SESSION['tutoria']['space']?>" class="form-control form-control-sm">
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Fecha :</th>
                                            <td><input type="date" name="reserva" id="reserva" value="<?=$_SESSION['tutoria']['reservdate']?>" class="form-control form-control-sm"></td>
                                        </tr>
                                        </tbody>

                                    </table>
                                    <button type="submit" class="btn btn-info">Actualizar</button>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div><!-- /.card -->
        </div>
        <div class="modal fade" id="addsection" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar <?=$_SESSION['tutoria'] ['modality']==0?'Aula':'Enlace'?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url . 'tutorials/approve'?>" method="POST">
                            <input type="hidden" id="idtutorial" name="idtutorial" value="<?= $_SESSION['tutoria']['id'] ?>">
                            <input type="hidden" id="coordinator" name="coordinator" value="<?=$_SESSION['id']?>">
                            <input type="hidden" id="action" name="action" value="1"> <!-- Aprobacion -->
                            <div class="form-group">
                                <?php
                                if($_SESSION['tutoria'] ['modality']==0){ ?>
                                    <select id="section" name="section" class="form-control form-control-sm" required>
                                        <option value="" selected>Seleccionar una seccion</option>
                                        <?php
                                            foreach ($_SESSION['sections'] as $section){ ?>
                                                <option><?= $section['description'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                <?php
                                }else{?>
                                    <input type="url" class="form-control" id="section" name="section" minlength="10" maxlength="500" placeholder="Ejemplo: https//www.miclasevirtual.com/seccion/tutoria1" required>
                                <?php
                                }
                                ?>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Autorizar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal para la cancelacion -->
        <div class="modal fade" id="canceltut" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Cancelacion/Denegacion de solicitud</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url .'tutorials/approve'?>" method="POST">
                            <input type="hidden" id="idtutorial" name="idtutorial" value="<?= $_SESSION['tutoria']['id'] ?>">
                            <input type="hidden" id="coordinator" name="coordinator" value="<?=$_SESSION['id']?>">
                            <input type="hidden" id="action" name="action" value="3"><!-- desaprobacion -->
                            <div class="form-group">
                                <label for="section">Razon de cancelacion: </label>
                                    <input type="text" class="form-control" id="section" name="section" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Denegar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        } ?>
    </div>
</div>
    <!-- /.row -->
<script>
    $(document).ready(function () {
        $("#asignatura").change(function () {
            $("#asignatura option:selected").each(function () {
                id_course = $(this).val();
                $.post("<?=base_url?>schedule/getSchedule", {
                    id_course: id_course
                }, function (data) {
                    $("#horario").html(data);
                });
            });
        });
    });
</script>
