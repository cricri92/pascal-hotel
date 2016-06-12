<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Verificar disponibilidad de habitaciones</h1>
            <?php if($this->session->flashdata('message') != null ): ?>
                <center>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $this->session->flashdata('message'); ?></strong> 
                    </div>
                </center>
            <?php endif; ?>
        </div>
        <!-- /.col-lg-12 -->
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="backend/reservas/verificando-disponibilidad" method="POST">
                                <div class="form-group">
                                	<label>Fecha de entrada</label>
                                	<input class="datepicker form-control" type="text" name="check_in" />
                                    <p class="help-block">Seleccione una fecha de entrada.</p>
                                    <?php echo form_error('check_in');?>
                                </div>
                                <div class="form-group">
                                    <label>Fecha de salida</label>
                                    <input class="datepicker form-control" type="text" name="check_out" />
                                    <p class="help-block">Seleccione una fecha de salida.</p>
                                    <?php echo form_error('cedula');?>
                                </div>
                                <div class="form-group">
	                                <button type="submit" class="btn btn-success">Verificar disponibilidad</button>
	                                <button type="reset" class="btn btn-default">Borrar campos</button>
                                </div>
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