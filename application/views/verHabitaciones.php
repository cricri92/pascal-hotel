<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Habitaciones</h1>
                    </div>
                    <?php if($this->session->flashdata('message') != null ): ?>
                        <center>
                            <div class="alert alert-success" role="alert">
                                <strong><?php echo $this->session->flashdata('message'); ?></strong> 
                            </div>
                        </center>
                    <?php endif; ?>
                    <div class="panel-body">
                        <?php if (!empty($rooms)): ?>
                            <?php foreach ($rooms as $key => $value) { ?>
                                <div class="col-md-4">
                                    <div class="panel panel-yellow">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="glyphicon glyphicon-bed fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h3>
                                                        <?php echo $rooms[$key]['room_name']; ?>
                                                        <small><?php echo $rooms[$key]['number']; ?></small>
                                                    </h3>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h3>
                                                        <small><?php echo $rooms[$key]['capacity']; ?> personas</small>
                                                    </h3>
                                                </div>
                                            </div>
                                            <?php echo $rooms[$key]['available_value']; ?>
                                        </div>
                                        <a href="#">
                                            <div class="panel-footer">
                                                <span class="pull-right">  
                                                    <a href="backend/habitaciones/ver-habitacion/<?php echo $rooms[$key]['number']; ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                    <?php if($user->user_role == 1):?>
                                                        <a href="backend/habitaciones/actualizar-habitacion/<?php echo $rooms[$key]['number']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="backend/habitaciones/eliminar-habitacion/<?php echo $rooms[$key]['number']; ?>"><i class="glyphicon glyphicon-trash"> </i></a>
                                                    <?php endif; ?>
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
                        