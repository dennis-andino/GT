<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
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
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Gestión de usuarios</h5>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#staticBackdrop">Crear Nuevo</button>
                        </div>
                        <div class="card-body">
                            <table id="maintable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Perfil</th>
                                    <th>correo</th>
                                    <th>Telefono</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_SESSION['userslist'])){
                                    foreach ($_SESSION['userslist'] as $user) {
                                        ?>
                                        <tr>
                                            <td><?=$user['id']?></td>
                                            <td><?=$user['alias']?></td>
                                            <td><?=$user['privilege']?></td>
                                            <td><?=$user['email']?></td>
                                            <td><?=$user['phone']?></td>
                                            <td>
                                            <form action="<?= base_url.'users/userInfo'?>" method="POST" style="display: inline-block;">
                                                <input type="hidden"  name="iduser" id="iduser" value="<?=$user['id']?>">
                                                <input type="hidden"  name="role" id="role" value="<?=$user['baseon']?>">
                                                <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ver ficha completa"><i class="far fa-id-card"></i></button>
                                            </form>
                                                <button type="button" value="<?=$user['id']?>" id="<?=$user['id']?>" class="btn btn-warning btn-sm edit-btn" data-toggle="modal" data-target="#editModal"><i class="fas fa-user-edit"></i></button>
                                                <form action="<?= base_url.'users/enableUser'?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" name="availability" value="<?=$user['availability']?>">
                                                    <input type="hidden"  name="iduser" id="iduser" value="<?=$user['id']?>">
                                                    <?php
                                                    if($user['availability']==1){ ?>
                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Desactivar usuario"><i class="fas fa-user-slash"></i></button>
                                                        <?php
                                                    }else{?>
                                                        <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Activar usuario"><i class="fas fa-user-check"></i></button>
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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="<?=base_url?>users/save" method="POST">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="fullname">Nombre Completo</label>
                            <input type="text" class="form-control form-control-sm" id="fullname" name="fullname" minlength="15" maxlength="50" required>
                        </div>
                            <div class="form-group col-md-4">
                                <label for="role">Perfil</label>
                                <select id="role" name="role" class="form-control form-control-sm" required>
                                    <option value="" selected>Elegir</option>
                                    <?php
                                    if(isset($_SESSION['roles'])){
                                        foreach ($_SESSION['roles'] as $rol){ ?>
                                            <option value="<?=$rol['id']?>"><?=$rol['privilege']?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="email">Correo</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone">Telefono</label>
                                <input type="tel" class="form-control form-control-sm" id="phone" name="phone" minlength="8" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="birthdate">Dia de Nacimiento</label>
                                <input type="date" class="form-control form-control-sm" min="1950-01-01" id="birthdate" name="birthdate" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="campus">Cuenta Institucional</label>
                                <input type="text" class="form-control form-control-sm" id="account" name="account" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="campus">Facultad</label>
                                <select id="career" name="career" class="form-control form-control-sm">
                                    <?php
                                    if(isset($_SESSION['careers'])){
                                        foreach ($_SESSION['careers'] as $career){ ?>
                                            <option value="<?=$career['id']?>"><?=$career['description']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="username">Campus</label>
                                <select id="campus" name="campus" class="form-control form-control-sm">
                                    <?php
                                    if(isset($_SESSION['campus'])){
                                        foreach ($_SESSION['campus'] as $campu){?>
                                            <option value="<?=$campu['id']?>"><?=$campu['description']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="admissiondate">Fecha de ingreso</label>
                                <input type="date" class="form-control form-control-sm" min="1960-01-01" id="admissiondate" name="admissiondate" required>
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control form-control-sm" id="username" name="username" minlength="10" maxlength="25" required>
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="username">Contraseña</label>
                                <input type="password" class="form-control form-control-sm " id="pass" name="pass"  minlength="8" maxlength="15" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" title="La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico." required>
                            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </div>
    </form>
</div>
<!-- End Modal -->
<!-- modal edit -->
<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edicion de Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="editForm"></div>
            </div>
        </div>
</div>
<!-- modal edit end -->
<script type="text/javascript">
    $(document).ready(function(){
        // Edit record to mysqli from php using jquery ajax
        $(document).on("click",".edit-btn",function(){
            var id = $(this).val();
            $.ajax({
                url :"<?=base_url?>users/getEditUser",
                type:"POST",
                cache:false,
                data:{editId:id},
                success:function(data){
                    $("#editForm").html(data);
                },
            });
        });
    });
</script>
