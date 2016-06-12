<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nueva habitación</h1>
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
                                <form role="form" action="backend/habitaciones/crear-habitacion" method="POST">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <input class="form-control" name="number" autofocus>
                                        <p class="help-block">Entre 001 y 999</p>
                                        <?php echo form_error('number')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre de habitación</label>
                                        <input class="form-control" name="room_name">
                                        <p class="help-block">Nombre artístico de la habitación.</p>
                                        <?php echo form_error('room_name')?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="1" name="available">
                                    </div>
                                    <div class="form-group">
                                        <label>Capacidad</label>
                                        <select name="capacity" class="form-control">
                                            <option value="">Seleccione una</option>
                                            <option value="2">2 personas</option>
                                            <option value="4">4 personas</option>
                                            <option value="6">6 personas</option>
                                        </select>
                                        <p class="help-block">Capacidad máxima de la habitación.</p>
                                        <?php echo form_error('capacity')?>
                                    </div>
                                    <button type="submit" class="btn btn-success">Crear habitación</button>
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