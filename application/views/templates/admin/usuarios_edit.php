<h1 class="display-4">Editar usuario</h1>
<?php echo validation_errors(); ?>
<?php if(isset($message)){ ?>
<div class="alert alert-warning">
    <p>
        <i class="fa fa-exclamation" aria-hidden="true"></i> <?php echo $message; ?>
    </p>
</div>
<?php } ?>
<?php echo form_open('admin/usuarios/edit/'.$usuarios_select[0]['id']); ?>
<table class="table table-striped">
    <tr>
        <td>ID:</td>
        <td>
            <input type="text" name="id" class="form-control" value="<?php echo $usuarios_select[0]['id']; ?>" readonly="">
        </td>
    </tr>
    <tr>
        <td>Contrase&ntilde;a:</td>
        <td><input type="password" name="passwordoriginal" class="form-control" value="<?php echo set_value('passwordoriginal'); ?>"></td>
    </tr>
    <tr>
        <td>Repita Contrase&ntilde;a:</td>
        <td><input type="password" name="passwordcheck" class="form-control" value="<?php echo set_value('passwordcheck'); ?>"></td>
    </tr>
    <tr>
        <td>Nombre:</td>
        <td><input type="text" name="nombre" class="form-control" value="<?php echo $usuarios_select[0]['first_name']; ?>"></td>
    </tr>
    <tr>
        <td>Apellidos:</td>
        <td><input type="text" name="apellidos" class="form-control" value="<?php echo $usuarios_select[0]['last_name']; ?>"></td>
    </tr>
    <tr>
        <td>E-Mail:</td>
        <td><input type="text" name="correo" class="form-control" value="<?php echo $usuarios_select[0]['email']; ?>"></td>
    </tr>
    <tr>
        <td>RUN:</td>
        <td><input type="text" name="run" class="form-control" value="<?php echo $usuarios_select[0]['rut']; ?>"></td>
    </tr>
    <tr>
        <td>Tel&eacute;fono:</td>
        <td><input type="text" name="fono" class="form-control" value="<?php echo $usuarios_select[0]['phone']; ?>"></td>
    </tr>
    <tr>
        <td>Empresa:</td>
        <td>
            <select name="empresa" class="form-control">
              <option value="-1" selected disabled>Elegir</option>
                <?php
                    $sel = [];
                    for( $n = 0; $n < count($empresas); $n++ ){
                      if( $usuarios_select[0]['company'] == $empresas[$n]['rut'] ){
                        $sel[] = "selected='selected'";
                      } else {
                        $sel[] = "";
                      }
                        echo "<option value=\"".$empresas[$n]['rut']."\" ".$sel[$n].">".$empresas[$n]['empresa']."</option>";
                    }
                ?>
            </select>

        </td>
    </tr>
    <tr>
        <td>Elegir perfil:</td>
        <td>
            <select name="grupo" class="form-control">
            <?php
                    $selected = [];
                    for($n = 0; $n < count($grupos); $n++){
                        if ( $user_groups[0]->id == $grupos[$n]->id) {
                            $selected[] = "selected";
                        } else {
                            $selected[] = "";
                        }
                        echo "<option value=\"".$grupos[$n]->id."\" ".$selected[$n].">".$grupos[$n]->name."</option>";
                    }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" class="btn btn-primary" value="Editar usuario">
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
