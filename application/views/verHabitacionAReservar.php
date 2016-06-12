<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Habitación número <?php echo $room_info['number'];?></h1>
        </div>
    
        <!-- tab-pane: profile -->
        <div class="tab-pane active" id="profile">
            <!-- form profile -->
            <form class="panel form-horizontal form-bordered" name="form-profile">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nombre de la habitación</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $room_info['room_name']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Capacidad máxima</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $room_info['capacity']; ?> personas</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Fecha de entrada</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $reserve_info['check_in']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Fecha de salida</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $reserve_info['check_out']; ?></p>
                        </div>
                    </div>
                    <?php if($user->user_role == 1): ?>
	                    <div class="form-group">
	                        <label class="col-sm-4 control-label">Fecha de creación</label>
	                        <div class="col-sm-5">
	                            <p class="help-block"><?php echo $room_info['create_at'] ?></p>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-4 control-label">Actualizada por ultima vez</label>
	                        <div class="col-sm-5">
	                            <p class="help-block"><?php echo $room_info['update_at'] ?></p>
	                        </div>
	                    </div>
	                <?php endif; ?>
                    <div class="form-group">
                    	<a href="backend/reservas/verificando-disponibilidad" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Volver atrás</a>
                    	<a href="backend/reservas/crear-reserva/<?php echo $room_info['number']; ?>/<?php echo $reserve_info['check_in']; ?>/<?php echo $reserve_info['check_out']; ?>" class='btn btn-success'>Reservar esta habitacion</a>
                    </div>
        		</div>   
            </form>
        </div>  
	</div>
</div>
