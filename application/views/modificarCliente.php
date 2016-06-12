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
                                <form role="form" action="backend/clientes/modificacion-cliente" method="POST">
                                    <input type="hidden" name="customer_id" value="<?php echo $customer_info['cedula']; ?>">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" name="name" value="<?php echo $customer_info['name']; ?>">
                                        <p class="help-block">Ingrese su nombre y apellido.</p>
                                        <?php echo form_error('name')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Cedula</label>
                                        <input class="form-control" name="cedula" value="<?php echo $customer_info['cedula']; ?>" readonly>
                                        <?php echo form_error('cedula')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Direccion</label>
                                        <textarea class="form-control" name="direccion" text="<?php echo $customer_info['direccion']; ?>"></textarea>
                                        <p class="help-block">Maximo 500 caracteres.</p>
                                        <?php echo form_error('direccion')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input class="form-control" name="telefono" value="<?php echo $customer_info['telefono']; ?>">
                                        <p class="help-block">Formato cod area-telefono.</p>
                                        <?php echo form_error('telefono')?>
                                    </div>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
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