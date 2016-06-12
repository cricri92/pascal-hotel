<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nuevo usuario</h1>
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
                                <form role="form" action="backend/usuarios/crear-usuario" method="POST">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" name="name" autofocus>
                                        <p class="help-block">Ingrese su nombre y apellido.</p>
                                        <?php echo form_error('name')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre de usuario</label>
                                        <input class="form-control" name="user_name">
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
                                        <label>Cargo</label>
                                        <select name="user_role_id" class="form-control">
                                            <option value="">Seleccione uno</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Recepcionista</option>
                                            <option value="3">Gerente</option>
                                        </select>
                                        <?php echo form_error('user_role_id')?>
                                    </div>
                                    <button type="submit" class="btn btn-success">Crear nuevo usuario</button>
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