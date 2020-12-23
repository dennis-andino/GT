<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Notificaciones</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Notificaciones</li>
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
                <div class="col-lg-12">
                    <div class="timeline">
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-red">Ultimas notificaciones</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <?php
                        if(isset($notifications)){
                        while($msj = $notifications->fetch_object()){?>
                        <div>
                            <i class="fas fa-mug-hot"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i><?=' '.$msj->date?></span>
                                <h3 class="timeline-header"><a href="#"><?=$msj->subject?></a></h3>
                                <div class="timeline-body">
                                    <?=$msj->content?>
                                </div>
                            </div>
                        </div>
                            <?php
                        }
                        }
                        ?>
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
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
