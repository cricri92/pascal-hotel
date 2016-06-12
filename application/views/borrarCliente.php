<div id="page-wrapper">
    <div class="row">
    	<div class="panel-heading col-lg-12">
            <h1 class="page-header">Perfil de cliente</h1>
        </div>
		<div class="tab-pane active" id="profile">
            <!-- form profile -->
            <form class="panel form-horizontal form-bordered" name="form-profile" action="backend/clientes/eliminacion-cliente/<?php echo $customer_info['cedula']; ?>">
                <div class="panel-body">
    				<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> ¿Está seguro que desea remover este usuario?</div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $customer_info['name']; ?></p>
                        </div>
                    </div>
	                <div class="form-group">
	                    <label class="col-sm-4 control-label">Cedula</label>
	                    <div class="col-sm-5">
	                        <p class="help-block"><?php echo $customer_info['cedula']; ?></p>
	                    </div>
	                </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Direccion</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $customer_info['direccion']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Telefono</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $customer_info['telefono']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Fecha de creación</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $customer_info['create_at'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Actualizada por ultima vez</label>
                        <div class="col-sm-5">
                            <p class="help-block"><?php echo $customer_info['update_at'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                    	<a href="backend/clientes/ver-clientes" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Volver atrás</a>
                    </div>
                    <div class="form-group">
                    	<button class="btn btn-danger">Eliminar este usuario</button>
                    </div>
        		</div>   
            </form>
        </div>
	</div>      
</div>
