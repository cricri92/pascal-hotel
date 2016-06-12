<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nuevo cliente</h1>
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
                            <form role="form" action="backend/clientes/crear-cliente" method="POST">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" name="name" autofocus>
                                    <p class="help-block">Ingrese su nombre y apellido.</p>
                                    <?php echo form_error('name')?>
                                </div>
                                <div class="form-group">
                                    <label>Cedula</label>
                                    <input class="form-control" name="cedula">
                                    <p class="help-block">Ingrese solo numeros.</p>
                                    <?php echo form_error('cedula')?>
                                </div>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <textarea class="form-control" name="direccion"></textarea> 
                                    <p class="help-block">Maximo 500 caracteres.</p>
                                    <?php echo form_error('direccion')?>
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input class="form-control" name="telefono">
                                    <p class="help-block">Utilice el formato cod area-numero.</p>
                                    <?php echo form_error('telefono')?>
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
</div>