<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Habitación número <?php echo $room_info['number'];?></h1>
        </div>
    
        <!-- tab-pane: profile -->
        <div class="tab-pane active" id="profile">
            <!-- form profile -->
        
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nombre de la habitación</label>
                    <div class="col-sm-5">
                        <p class="help-block"><?php echo $room_info['room_name']; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Disponibilidad</label>
                    <div class="col-sm-5">
                        <p class="help-block"><?php echo $room_info['available_value']; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Capacidad máxima</label>
                    <div class="col-sm-5">
                        <p class="help-block"><?php echo $room_info['capacity']; ?> personas</p>
                    </div>
                </div>
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
                <div class="form-group">
                	<a href="backend/habitaciones/ver-habitaciones" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Volver atrás</a>
					<a class="btn btn-danger" href="backend/habitaciones/eliminacion-usuario/<?php echo $room_info['number']; ?>">Eliminar esta habitación</a>
                </div>
    		</div>   
           
        </div>  
	</div>
</div>
