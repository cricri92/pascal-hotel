<div id="page-wrapper">
    <div class="row">
    	<div class="panel-heading col-lg-12">
            <h1 class="page-header">Perfil</h1>
        </div>
		<div class="tab-pane active" id="profile">
            <!-- form profile -->
            <form class="panel form-horizontal form-bordered" name="form-profile" action="backend/usuarios/eliminacion-usuario/<?php echo $user_info['id']; ?>">
                <div class="panel-body">
    				<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> ¿Está seguro que desea remover este usuario?</div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $user_info['name']; ?></p>
                        </div>
                    </div>
	                <div class="form-group">
	                    <label class="col-sm-4 control-label">Nombre de usuario</label>
	                    <div class="col-sm-5">
	                        <p class="help-block"><?php echo $user_info['user_name']; ?></p>
	                    </div>
	                </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Cargo</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $user_info['privilege_name']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Fecha de creación</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $user_info['create_at'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Actualizada por ultima vez</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $user_info['update_at'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                    	<a href="backend/usuarios/ver-usuarios" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Volver atrás</a>
                    </div>
                    <div class="form-group">
                    	<button class="btn btn-danger">Eliminar este usuario</button>
                    </div>
        		</div>   
            </form>
        </div>
	</div>      
</div>
