<style>
    input {
        width: 250px;
        padding: 5px;
    }
    .outlinenone {
        outline: none;

    }
    .sinborde {
        border: 0;
    }

</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Mi Cuenta</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
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
                        <img src="../uploads/photos/<?=$user->photo?>" class="img-fluid img-circle">
                        <div class="card-body">
                            <h5 class="card-title"><?=$user->alias?></h5>
                            <p class="card-text"><?=$user->privilege?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="card card-primary card-outline">
                        <form  action="<?=base_url.'users/updateInfo'?>" method="POST">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">Nombre:</th>
                                <td colspan="2"><?=$user->fullname?></td>
                                <th scope="row">Fecha de Nacimiento: <i class="fas fa-pencil-alt prefix"></i></th>
                                <td><input type="date" value="<?=$user->birthDate?>" class="form-control outlinenone sinborde" name="birthday"></td>
                            </tr>
                            <tr>
                                <th scope="row">Correo: <i class="fas fa-pencil-alt prefix"></i></th>
                                <td colspan="2"><input type="text" value="<?=$user->email?>" name="email" class="form-control outlinenone sinborde"></td>
                                <th scope="row">Telefono: <i class="fas fa-pencil-alt prefix"></i></th>
                                <td><input type="tel" value="<?=$user->phone?>" name="phone" class="form-control outlinenone sinborde"></td>
                            </tr>
                            <tr>
                                <th scope="row">Facultad: </th>
                                <td><?=$user->career?></td>
                                <th scope="row" colspan="2">Campus: </th>
                                <td><?=$user->campus?></td>
                            </tr>
                            <tr>
                                <th scope="row">Ingreso a la Institucion: </th>
                                <td><?=$user->admissionDate?></td>
                                <th scope="row" colspan="2">Cuenta Institucional: </th>
                                <td><?=$user->account?></td>
                            </tr>
                            <tr>
                                <th scope="row">Usuario</th>
                                <td><?=$user->username?></td>
                                <th scope="row" colspan="2">Creada el :</th>
                                <td><?=$user->createOn?></td>
                            </tr>
                            <tr>
                                <th scope="row">Perfil:</th>
                                <td><?=$user->privilege?></td>
                                <th scope="row" colspan="2">Estado:</th>
                                <td><?=$user->availability==1?'Activo':'Inhabilitado'?></td>
                            </tr>
                            <tr>
                                <th scope="row">Biografia: <i class="fas fa-pencil-alt prefix"></i></th>
                                <td colspan="4"><input type="text" value="<?=$user->observations?>" name="biografy" class="form-control outlinenone"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="align-content-end"></td>
                                <td colspan="1"><button type="submit" class="btn btn-info btn-block">Actualizar</button></td>
                            </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <?php
                }
                ?>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <div class="card card-danger card-outline">
                    <table class="table">
                        <tbody>
                        <tr>
                            <form action="<?=base_url.'users/updatePhoto'?>" method="post" enctype="multipart/form-data">
                            <th scope="row">Fotografia : <i class="fas fa-pencil-alt prefix"></i></th>
                            <td colspan="2"><input type="file" name="photo" accept="image/*" required></td>
                            <th scope="row"></th>
                            <td><button type="submit" class="btn btn-warning" name="photo">Cambiar</button></td>
                            </form>
                        </tr>
                        <tr>
                            <form action="<?=base_url.'users/updatePass'?>" method="post">
                            <th scope="row">Clave de acceso : <i class="fas fa-pencil-alt prefix"></i></th>
                            <td colspan="2"><input type="password" class="form-control" name="pass" minlength="8" maxlength="15" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" title="La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.">
                                <p><small>La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.</small></p>
                            </td>
                            <th scope="row"></th>
                            <td><button type="submit" class="btn btn-danger">Modificar</button></td>
                            </form>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php if(isset($_SESSION['alert'])):?>
    <script> swal("<?=$_SESSION['alert']['title']?>","<?=$_SESSION['alert']['msj']?>","<?=$_SESSION['alert']['type']?>");</script>
    <?php unset($_SESSION['alert']);
endif; ?>