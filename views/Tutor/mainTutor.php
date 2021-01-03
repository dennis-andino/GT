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
                <div class="col">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Tutorias Asignadas</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="tutoriastbl" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Solicitante</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Asignatura</th>
                                    <th>Asunto</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($tutorials)) {
                                    while ($onetutorial = $tutorials->fetch_object()) {?>
                                        <tr>
                                            <td><?= $onetutorial->id ?></td>
                                            <td><?= $onetutorial->student ?></td>
                                            <td><?= $onetutorial->reservdate ?></td>
                                            <td><?= $onetutorial->schedule ?></td>
                                            <td><?= $onetutorial->coursename ?></td>
                                            <td><?= $onetutorial->subject ?></td>
                                            <td>
                                                <form action="<?= base_url . 'tutorials/getinfo' ?>" method="POST">
                                                    <input type="hidden" id="idtutorial" name="idtutorial" value="<?= $onetutorial->id ?>">
                                                    <?php
                                                    if ($onetutorial->status == 0) { ?> <!--Tutoria en proceso-->
                                                        <button class="btn btn-success btn-sm " data-toggle="tooltip" data-placement="top" title="Tutoria en proceso...">
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                        </button>
                                                        <?php
                                                    } else if ($onetutorial->status == 1) { ?> <!-- aprobada/programada -->
                                                        <button name="action" value="getinfo" type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Tutoria Programada."><i class="far fa-clock"></i></button>
                                                        <?php
                                                    } else { ?> <!-- finalizada -->
                                                        <button name="action" value="getinfo" type="submit" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Tutoria Finalizada."><i class="fas fa-check-double"></i></button>
                                                        <?php
                                                    }
                                                    ?>
                                                </form>
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
                if (isset($_SESSION['form']) && $_SESSION['form'] == true) { ?>
                    <div class="col-lg-5">
                        <div class="card card-primary">
                            <div class="card-header text-left">
                                <h5 class="m-0">Solicitud &nbsp;#<?= $_SESSION['tutoria']['id'] ?>
                                    <?php
                                    if ($_SESSION['tutoria']['status'] == 1) { ?>
                                        <span class="badge badge-secondary">Lista para iniciar</span>
                                        <?php
                                    }elseif ($_SESSION['tutoria']['status'] == 0) { ?>
                                        <span class="badge badge-info">Ahora mismo ejecutandose</span>
                                        <?php
                                    } elseif ($_SESSION['tutoria']['status'] == 2) { ?>
                                        <span class="badge badge-secondary">Finalizada</span>
                                        <?php
                                    }
                                    ?>
                                    <div class="float-right">
                                        <?php
                                        if ($_SESSION['tutoria']['status'] == 1) {?>
                                            <form action="<?= base_url . 'tutorials/start' ?>" method="POST">
                                                <input type="hidden" id="idtutorial" name="idtutorial" value="<?=$_SESSION['tutoria']['id']?>">
                                                <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Iniciar Tutoria"><i class="fas fa-play"></i></button>
                                            </form>
                                            <?php
                                        } elseif ($_SESSION['tutoria']['status'] == 0) { ?>
                                            <form action="<?= base_url . 'tutorials/stop' ?>" method="POST">
                                                <input type="hidden" id="idtutorial" name="idtutorial" value="<?=$_SESSION['tutoria']['id']?>">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Finalizar Tutoria"><i class="fas fa-stop-circle"></i>
                                                </button>
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
                                            <td><?= $_SESSION['tutoria']['requestdate'] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Asignada a :</th>
                                            <td>Usted</td>
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
                                                <th scope="row">Seccion:</th>
                                                <td colspan="3"><?php if ($_SESSION['tutoria']['modality'] == 0): ?>
                                                    <?= $_SESSION['tutoria']->space ?>
                                                <?php else: ?>
                                                        <a href="<?= $_SESSION['tutoria']['space'] ?>"><strong>Aula Virtual</strong></a>
                                                <?php endif;?>
                                                    </td>
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
                                            <td colspan="3"><a href="../uploads/documents/<?=$_SESSION['tutoria']['filename']?>" class="badge badge-light"><?= $_SESSION['tutoria']->filename ?></a></td>
                                        </tr>
                                        <?php endif;?>
                                        </tbody>
                                    </table>
                                </div>
                                <form action="<?= base_url . 'tutorials/SaveAssistance'?>" method="POST">
                                    <input type="hidden" name="idtutorial" id="idtutorial" value="<?=$_SESSION['tutoria']['id']?>">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="3">
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
                                                        <input type="checkbox" name="asistentes[]" value="<?= $member['id'] ?>" autocomplete="off" <?php if ($member['assistance'] == 1) {echo 'checked';} ?>>
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
                                    if ($_SESSION['tutoria']['status'] == 0) { ?>
                                        <button class="btn btn-info" type="submit">Enviar Asistencia</button>
                                        <?php
                                    }
                                    ?>
                                </form>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
