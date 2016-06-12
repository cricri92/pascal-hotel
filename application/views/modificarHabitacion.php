<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Actualizar habitación número <?php echo $room_info['number'];?></h1>
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
                                <form role="form" action="backend/habitaciones/modificacion-habitacion" method="POST">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <input class="form-control" name="number" value="<?php echo $room_info['number']; ?>" readonly>
                                        <p class="help-block">Entre 001 y 999</p>
                                        <?php echo form_error('number')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre de habitación</label>
                                        <input class="form-control" name="room_name" value="<?php echo $room_info['room_name']; ?>">
                                        <p class="help-block">Nombre artístico de la habitación.</p>
                                        <?php echo form_error('room_name')?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $room_info['available']; ?>" name="available">
                                        <?php echo form_error('available')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <select name="capacity" class="form-control">
                                            <option value="">Seleccione uno</option>
                                            <?php if($room_info['capacity'] == 2): ?>
                                                <option value="2" selected>2 personas</option>
                                                <option value="4">4 personas</option>
                                                <option value="6">6 personas</option>
                                            <?php elseif($room_info['capacity'] == 4): ?>
                                                <option value="2">2 personas</option>
                                                <option value="4" selected>4 personas</option>
                                                <option value="6">6 personas</option>
                                            <?php elseif($room_info['capacity'] == 6 ): ?>
                                                <option value="2">2 personas</option>
                                                <option value="4">4 personas</option>
                                                <option value="6" selected>6 personas</option>
                                            <?php endif; ?>
                                        </select>
                                        <?php echo form_error('capacity')?>
                                    </div>
                                    <div class="form-group">
                                        <a href="backend/habitaciones/ver-habitaciones" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Volver atrás</a>
                                        <button type="submit" class="btn btn-success">Actualizar</button>
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