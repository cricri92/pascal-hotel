<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Perfil de usuario</h1>
        </div>
    
        <!-- tab-pane: profile -->
        <div class="tab-pane active" id="profile">
            <!-- form profile -->
            <form class="panel form-horizontal form-bordered" name="form-profile">
                <div class="panel-body">
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
        		</div>   
            </form>
        </div>  
	</div>
</div>
