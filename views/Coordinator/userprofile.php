<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Perfil de Usuario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
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
                <?php
                if(isset($user)){?>
                <!-- /.col-md-6 -->
                <div class="col-lg-2">
                    <div class="card card-success card-outline">
                        <img src="../assets/dist/img/user2-160x160.png" class="img-fluid img-circle">
                        <div class="card-body">
                            <h5 class="card-title"><?=$user->alias?></h5>
                            <p class="card-text"><?=$user->privilege?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="card card-primary card-outline">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row" >Nombre:</th>
                                <td colspan="2"><?=$user->fullname?></td>
                                <th scope="row">Fecha de Nacimiento: </th>
                                <td><?=$user->birthDate?></td>
                            </tr>
                            <tr>
                                <th scope="row">Correo :</th>
                                <td colspan="2"><?=$user->email?></td>
                                <th scope="row">Telefono</th>
                                <td><?=$user->phone?></td>
                            </tr>
                            <tr>
                                <th scope="row">Facultad: </th>
                                <td><?=$user->career?></td>
                                <th scope="row" colspan="2">Campus: </th>
                                <td><?=$user->campus?></td>
                            </tr>
                            <tr>
                                <th scope="row">Ingreso a la Institucion: </th>
                                <td ><?=$user->admissionDate?></td>
                                <th scope="row" colspan="2">cuenta Institucional: </th>
                                <td><?=$user->account?></td>
                            </tr>
                            <tr>
                                <th scope="row">Usuario </th>
                                <td ><?=$user->username?></td>
                                <th scope="row" colspan="2">Creada el :</th>
                                <td><?=$user->createOn?></td>
                            </tr>
                            <tr>
                                <th scope="row">Perfil:</th>
                                <td ><?=$user->privilege?></td>
                                <th scope="row" colspan="2">Estado:</th>
                                <td><?=$user->availability==1?'Activo':'Inhabilitado'?></td>
                            </tr>
                            <tr>
                                <th scope="row">Observaciones:</th>
                                <td colspan="4"><?=$user->observations?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <?php
            }
                if($user->baseon=='Tutor'){?>
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-4">
                    <div class="card card-warning card-outline">
                        <div class="card-header bg-light">
                            <h5 class="card-title"><strong>Horarios</strong></h5>
                        </div>
                        <table class="table table-sm">
                            <thead>
                            <th>Hora</th>
                            <th>Asignatura</th>
                            <th>Estado</th>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($schedule)){
                                while ($sched = $schedule->fetch_object()){ ?>
                            <tr>
                                <td><?=$sched->schedule?></td>
                                <td><?=$sched->coursename?></td>
                                <td>
                                    <?php
                                    if($sched->availability==1){?>
                                       <form action="" method="post">
                                           <button type="submit" class="btn btn-danger btn-sm">Inhabilitar</button>
                                       </form>
                                            <?php
                                    }else{?>
                                        <form action="" method="post">
                                            <button type="submit" class="btn btn-success btn-sm">Habilitar</button>
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
                <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header bg-light">
                            <h5 class="card-title"><strong>Tutorias Asignadas</strong></h5>
                        </div>
                        <table class="table table-sm table-condensed">
                            <thead>
                            <th>#</th>
                            <th>Asignatura</th>
                            <th>Horario</th>
                            <th>Estado</th>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($tutorials)){
                                while ($tutoria =$tutorials->fetch_object()){?>
                            <tr>
<td><?=$tutoria->id?></td>
<td><?=$tutoria->coursename?></td>
<td><?=$tutoria->schedule?></td>
                                <td>
                                    <form action="<?= base_url . 'tutorials/getinfo' ?>" method="POST" style="display: inline-block;">
                                        <input type="hidden" id="idtutorial" name="idtutorial" value="<?= $tutoria->id ?>">
                                    <?php
                                    if($tutoria->status==-1){ ?><!-- -1 pendiente , 0 en proceso, 1 aprobado/programada ,2 finalizado,3 denegado -->
                                        <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Pendiente de aprobacion"><i class="fas fa-hourglass-end"></i></button>
                                    <?php
                                    }elseif($tutoria->status==1){?><!-- programada -->
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Programada"><i class="far fa-clock"></i></button>
                                    <?php
                                    }elseif($tutoria->status==0){ ?> <!-- en progreso -->
                                        <button class="btn btn-success btn-sm " data-toggle="tooltip" data-placement="top" title="Ahora mismo en proceso">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        </button>
                                    <?php
                                    }elseif ($tutoria->status==2){ ?><!-- en finalizada -->
                                        <button type="submit" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Tutoria Finalizada"><i class="fas fa-check-double"></i></button>
                                    <?php
                                    }else{ ?><!-- Denegada -->
                                        <button type="submit" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Tutoria Denegada"><i class="fas fa-ban"></i></button>
                                    </form>
                                </td>
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
                <div class="col-lg-4">
                    <div class="card card-info card-outline">
                        <div class="card-header bg-light">
                            <h5 class="card-title"><strong>Comentarios Recibidos</strong></h5>
                        </div>
                        <div class="card-body">
                        <div class="direct-chat-messages">
                        <?php
                        if(isset($comments)){
                            $position=true;
                            $commentnumber=1;
                            if($comments->num_rows>0){
                                $commentnumber=$comments->num_rows;
                            }
                            $scoretotal=0;
                            while ($comment = $comments->fetch_object()){
                                if($position){?>
                                    <div class="direct-chat-msg">
                                        <!-- /.direct-chat-infos -->
                                        <i class="fab fa-snapchat"></i>
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            <?php echo $comment->stucomment;
                                            $scoretotal+=$comment->score;
                                            ?>
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                <?php
                                    $position=false;
                                }else{
                                    $position=true;?>
                                    <div class="direct-chat-msg right">
                                        <!-- /.direct-chat-infos -->
                                        <i class="fab fa-snapchat direct-chat-img"></i>
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            <?php echo $comment->stucomment;
                                            $scoretotal+=$comment->score;
                                            ?>
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                            <?php

                                }
                            }
                        }
                        ?>
                        </div>
                            <div class="card-footer">
                                <?php
                                $promedio=round(($scoretotal/$commentnumber));
                                switch($promedio){
                                    case 0:
                                        $evaluation='Malo';
                                            break;
                                    case 1:
                                        $evaluation='regular';
                                        break;
                                    case 2:
                                        $evaluation='Bueno';
                                        break;
                                    case 3:
                                        $evaluation='Muy Bueno';
                                        break;
                                    case 4:
                                        $evaluation='Excelente';
                                        break;
                                    default:
                                        $evaluation='cargando...';
                                }
                                ?>
                                <button type="button" class="btn btn-info">
                                    <?=$evaluation.' '?><span class="badge badge-light"><?=$promedio.'/5' ?></span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <?php
            }
            ?>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
