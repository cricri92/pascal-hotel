<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Usuarios</h1>
	                    <?php if($this->session->flashdata('message') != null ): ?>
	                        <center>
	                            <div class="alert alert-success" role="alert">
	                                <strong><?php echo $this->session->flashdata('message'); ?></strong> 
	                            </div>
	                        </center>
	                    <?php endif; ?>
                    </div>
            		<div class="panel-body">
	                    <?php if (!empty($users)): ?>
	                    	<?php foreach ($users as $key => $value) { ?>
		                        <div class="col-md-4">
				                    <div class="panel panel-primary">
				                        <div class="panel-heading">
				                            <div class="row">
				                                <div class="col-xs-3">
				                                    <i class="fa fa-user fa-5x"></i>
				                                </div>
				                                <div class="col-xs-9 text-right">
				                                    <h2>
				                                    	<?php echo $users[$key]['name']; ?>
				                                    	<small><?php echo $users[$key]['privilege_name']; ?></small>
				                                    </h2>
				                                </div>
				                            </div>
				                        </div>
				                        <a href="#">
				                            <div class="panel-footer">
				                                <span class="pull-right">  
				                                	<a href="backend/usuarios/ver-usuario/<?php echo $users[$key]['id']; ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
				                                	<a href="backend/usuarios/modificar-usuario/<?php echo $users[$key]['id']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
				                                	<a href="backend/usuarios/eliminar-usuario/<?php echo $users[$key]['id']; ?>"><i class="glyphicon glyphicon-trash"> </i></a>
			                                	</span>
				                                <div class="clearfix"> </div>
			                        		</div>
		                        		</a>
		                    		</div>
		                		</div>
	                    	<?php } ?>
	                	<?php endif;?>
                	</div>
                </div>
            </div>
            
        </div>