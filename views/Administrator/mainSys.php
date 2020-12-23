<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Bitacora</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Bitacora</li>
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
                            <h5 class="m-0">Registro de eventos</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="tutoriastbl" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Tipo</th>
                                    <th>usuario</th>
                                    <th>IP</th>
                                    <th>Descripcion</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if (isset($eventList)) {
                                    while ($event = $eventList->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td><?= $event->id ?></td>
                                            <td><?= $event->date_event ?></td>
                                            <td><?= $event->hour_event ?></td>
                                            <td><?= $event->typeevent ?></td>
                                            <td><?= $event->username ?></td>
                                            <td><?= $event->ip_address ?></td>
                                            <td><?= $event->description ?></td>
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


