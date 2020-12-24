<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestion de Datos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Datos</li>
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
                            <h5 class="m-0">Gestion de base de datos</h5>
                        </div>
                        <div class="card-header">
                            <form action="<?=base_url.'database/backUp'?>" method="post">
                                <div class="row">
                                    <div class="form-group col-7"></div>
                                    <div class="form-group col-3"><input type="text" class="form-control form-control-sm" name="backup_description" placeholder="Descripcion" required></div>
                                    <div class="form-group col-2"><button type="submit" class="btn btn-warning btn-sm ">Generar respaldo</button></div>
                                </div>
                            </form>
                            </div>
                        <div class="card-body table-responsive">
                            <table id="tutoriastbl" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Autor</th>
                                    <th>Descripcion</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if (isset($backupList)) {
                                    while ($backup = $backupList->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td><?= $backup->id ?></td>
                                            <td><?= $backup->date ?></td>
                                            <td><?= $backup->autor ?></td>
                                            <td><?= $backup->description ?></td>
                                            <td>
                                                <a role="button" class="btn btn-info btn-sm" href="<?= base_url.'assets/backup_bd/'.$backup->filename?>">Descargar</a>
                                                <a role="button" class="btn btn-warning btn-sm" href="">restaurar</a>
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
            <!-- /.card -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

