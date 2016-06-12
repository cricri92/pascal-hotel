<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Actualizar usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="backend/usuarios/modificacion-usuario" method="POST">
                                    <input type="hidden" name="user_id" value="<?php echo $user_info['id']; ?>">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" name="name" value="<?php echo $user_info['name']; ?>" autofocus>
                                        <p class="help-block">Ingrese su nombre y apellido.</p>
                                        <?php echo form_error('name')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre de usuario</label>
                                        <input class="form-control" name="user_name" value="<?php echo $user_info['user_name']; ?>" readonly>
                                        <p class="help-block">Este nombre será el usado para iniciar sesión.</p>
                                        <?php echo form_error('user_name')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input class="form-control" name="pass" type="password">
                                        <p class="help-block">Debe ser mayor a 6 caracteres.</p>
                                        <?php echo form_error('pass')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Repetir contraseña</label>
                                        <input class="form-control" name="repass" type="password">
                                        <p class="help-block">Debe ser mayor a 6 caracteres.</p>
                                        <?php echo form_error('pass')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <select name="user_role_id" class="form-control">
                                            <option value="">Seleccione uno</option>
                                            <?php if($user_info['user_role'] == 1): ?>
                                                <option value="1" selected>Administrador</option>
                                                <option value="2">Recepcionista</option>
                                                <option value="3">Gerente</option>
                                            <?php elseif($user_info['user_role'] == 2): ?>
                                                <option value="1">Administrador</option>
                                                <option value="2" selected>Recepcionista</option>
                                                <option value="3">Gerente</option>
                                            <?php elseif($user_info['user_role'] == 3 ): ?>
                                                <option value="1">Administrador</option>
                                                <option value="2">Recepcionista</option>
                                                <option value="3" selected>Gerente</option>
                                            <?php endif; ?>
                                        </select>
                                        <?php echo form_error('user_role_id')?>
                                    </div>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <button type="reset" class="btn btn-default">Borrar campos</button>
                                </form>
                                <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->