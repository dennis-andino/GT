<form action="<?=base_url.'users/updateUserInfo'?>"  method="post" >
    <input type="hidden" name="iduser" value="<?=$userinfo['id']?>">
<div class="form-row" xmlns="http://www.w3.org/1999/html">
    <div class="form-group col-md-8">
        <label for="fullname">Nombre Completo</label>
        <input type="text" class="form-control form-control-sm" id="fullname" name="fullname" minlength="15" maxlength="50" value="<?=$userinfo['fullname']?>">
    </div>
    <div class="form-group col-md-4">
        <label for="role">Perfil</label>
        <select id="role" name="role" class="form-control form-control-sm" required>
            <?php
            if(isset($_SESSION["roles"])){
            foreach ($_SESSION["roles"] as $rol){ ?>
            <option value="<?=$rol["id"]?>"><?=$rol["privilege"]?></option>
            <?php
                                    }
                                }
                                ?>
            <option value="<?=$userinfo['roleid']?>" selected><?=$userinfo['privilege']?></option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-8">
        <label for="email">Correo</label>
        <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?=$userinfo['email']?>"required>
    </div>
    <div class="form-group col-md-4">
        <label for="phone">Telefono</label>
        <input type="text" class="form-control form-control-sm" id="phone" name="phone" value="<?=$userinfo['phone']?>" minlength="8" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="birthdate">Dia de Nacimiento</label>
        <?php $fecha = date('Y-m-d', strtotime($userinfo['birthDate'])); ?>
        <input type="date" class="form-control form-control-sm" min="1950-01-01" id="birthdate" name="birthdate" value="<?=$fecha?>" required>
    </div>
    <div class="form-group col-md-6">
        <label for="account">Cuenta Institucional</label>
        <input type="text" class="form-control form-control-sm" id="account" name="account" value="<?=$userinfo['account']?>" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="career">Facultad</label>
        <select id="career" name="career" class="form-control form-control-sm">
            <?php
            if(isset($_SESSION["careers"])){
            foreach ($_SESSION["careers"] as $career){ ?>
            <option value="<?=$career["id"]?>"><?=$career["description"]?></option>
            <?php
            }
            }
            ?>
            <option value="<?=$userinfo['careerid']?>" selected><?=$userinfo['career']?></option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="campus">Campus</label>
        <select id="campus" name="campus" class="form-control form-control-sm">
            <?php
            if(isset($_SESSION["campus"])){
            foreach ($_SESSION["campus"] as $campu){?>
            <option value="<?=$campu["id"]?>"><?=$campu["description"]?></option>
            <?php
            }
            }
            ?>
            <option value="<?=$userinfo['campusid']?>" selected><?=$userinfo['campus']?></option>
        </select>
    </div>
</div>
    <div class="form-group">
        <label for="username">Observaciones</label>
        <p><textarea class="form-control form-control-sm" id="observations" name="observations"><?=$userinfo['observations']?></textarea></p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
</div>

