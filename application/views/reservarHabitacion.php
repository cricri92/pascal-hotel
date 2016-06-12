<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nueva reservacion</h1>
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
                            <form role="form" action="backend/reservas/reservar" method="POST">
                                <div class="form-group">
                                    <label>A nombre de</label>
                                    <input class="form-control" name="name">
                                    <p class="help-block">Ingrese nombre y apellido.</p>
                                    <?php echo form_error('name');?>
                                </div>
                                <div class="form-group">
                                    <label>Cedula de identidad</label>
                                    <input class="form-control" name="cedula">
                                    <p class="help-block">Ingrese solo numeros.</p>
                                    <?php echo form_error('cedula');?>
                                </div>
                                <div class="form-group">
                                	<label>Cantidad de personas</label>
                                	<select name="cantidad_p" class="form-control">
                                        <option value="">Seleccione una cantidad</option>
                                        <?php if ($room_info['capacity'] == 2): ?>
    	                                    <option value="1">1</option>
    	                                    <option value="2">2</option>
                                        <?php elseif($room_info['capacity'] == 4): ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
    	                                    <option value="3">3</option>
    	                                    <option value="4">4</option>
                                            <?php elseif ($room_info['capacity'] == 6): ?>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
        	                                    <option value="5">5</option>
        	                                    <option value="6">6</option>
                                            <?php endif; ?>
                                	</select>
                                    <?php echo form_error('cantidad_p');?>
                                </div>
                                <div class="form-group">
                                    <label>Habitacion nro</label>
                                    <input class="form-control" name="room_number" value="<?php echo $room_info['number']; ?>" readonly />
                                    <?php echo form_error('room_number');?>
                                </div>
                                <div class="form-group">
                                    <label>Capacidad maxima</label>
                                    <input class="form-control" name="capacity" value="<?php echo $room_info['capacity']; ?>" readonly/>
                                    <?php echo form_error('capacity');?>
                                </div>
                                <div class="form-group">
                                    <label>Fecha de entrada</label>
                                    <input class="form-control" type="text" name="check_in" value="<?php echo $reserve_info['check_in']; ?>" readonly/>
                                    <?php echo form_error('check_in');?>
                                </div>
                                <div class="form-group">
                                    <label>Fecha de salida</label>
                                    <input class="form-control" type="text" name="check_out" value="<?php echo $reserve_info['check_out']; ?>" readonly/>
                                    <?php echo form_error('check_out');?>
                                </div>

                                <input class="form-control" type="hidden" name="check_in_check" value="<?php echo $reserve_info['check_in']; ?>" />
                                <input class="form-control" type="hidden" name="check_out_check" value="<?php echo $reserve_info['check_out']; ?>" />
                                <input type="hidden" class="form-control" name="capacity_check" value="<?php echo $room_info['capacity']; ?>" />
                                <input type="hidden" class="form-control" name="room_number_check" value="<?php echo $room_info['number']; ?>" />

                                <button type="submit" class="btn btn-success">Reservar</button>
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