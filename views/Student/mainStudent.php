<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Solicitudes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Solicitudes</li>
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
                <div class="col-lg-5">
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h5 class="m-0">Nueva Solicitud de Tutoria</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url.'tutorials/save'?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="subject">Asunto</label>
                                        <input type="text" class="form-control form-control-sm" id="subject" name="subject" placeholder="Razon de la solicitud" maxlength="40" required>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-7">
                                        <label for="asignatura">Curso</label>
                                        <select id="asignatura" name="asignatura" class="form-control form-control-sm" required>
                                            <option value="" selected>Seleccionar un curso</option>
                                            <?php
                                            if(isset($_SESSION['asignatures'])){
                                                foreach ($_SESSION['asignatures'] as $asignatura){?>
                                                    <option value="<?= $asignatura['id']?>"><?= $asignatura['coursename'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                        <div class="form-group col-5">
                                            <label for="modality">Modalidad</label>
                                            <select id="modality" name="modality" class="form-control form-control-sm" required>
                                                <option value="" selected>Seleccionar modalidad</option>
                                                <option value="1">Virtual</option>
                                                <option value="0">Presencial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="horario">Horario</label>
                                            <select id="horario" name="horario" class="form-control form-control-sm" required>
                                                <option value="" selected>Seleccionar un horario</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-6">
                                            <?php
                                            $date_now = date('Y-m-d');
                                            $date_future = strtotime('+2 day', strtotime($date_now));
                                            $min_date = date('Y-m-d', $date_future);
                                            ?>
                                            <label for="reservdate">Fecha</label>
                                            <input type="date" class="form-control form-control form-control-sm" min="<?=$min_date?>"  id="reservdate" name="reservdate" value="<?=$min_date?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Comentarios</label>
                                        <textarea class="form-control form-control-sm" rows="2" id="details" name="details" placeholder="Explique con mas detalle la razon de la solicitud" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="filename">Adjuntar archivo (.JPG .PNG .PDF o .DOC)(opcional)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" id="filename" name="filename" accept="application/pdf, .doc, .docx ,image/png, .jpeg, .jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <input type="hidden" id="petitioner" name="petitioner" value="<?= $_SESSION["id"]?>">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enviar solicitud</button>
                                </div>
                            </form>

                        </div>
                    </div><!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-7">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Proximas Tutorias</h5>
                        </div>
                        <div class="card-body">
                            <table id="tutoriastbl" class="table table-bordered table-condensed">
                                <thead>
                                <tr>
                                    <th>Asunto</th>
                                    <th>Asignatura</th>
                                    <th>Dia</th>
                                    <th>hora</th>
                                    <th>Modalidad</th>
                                    <th>Unirme</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($nexttutable)){
                                    while ($onetutorial=$nexttutable->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td><?=$onetutorial->subject?></td>
                                            <td><?=$onetutorial->coursename?></td>
                                            <td><?=$onetutorial->reservdate?></td>
                                            <td><?=$onetutorial->starttime.'-'.$onetutorial->finishtime?></td>
                                            <td><?=$onetutorial->modalidad?></td>
                                            <form action="<?= base_url.'tutorials/join'?>" method="POST">
                                                <input type="hidden" name="petitioner" value="<?=$_SESSION['id']?>">
                                                <input type="hidden" name="tutorialid" value="<?=$onetutorial->id?>">
                                                <td><button type="submit" class="btn btn-block btn-info btn-xs">Unirme</button></td>
                                            </form>
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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php if(isset($_SESSION['alert'])):?>
    <script> swal("<?=$_SESSION['alert']['title']?>","<?=$_SESSION['alert']['msj']?>","<?=$_SESSION['alert']['type']?>");</script>
<?php unset($_SESSION['alert']); endif; ?>
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