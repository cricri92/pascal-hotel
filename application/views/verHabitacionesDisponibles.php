<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Habitaciones disponibles para las fechas <?php echo $check_in; ?> y <?php echo $check_out; ?></h1>
                    </div>
                    <?php if($this->session->flashdata('message') != null ): ?>
                        <center>
                            <div class="alert alert-success" role="alert">
                                <strong><?php echo $this->session->flashdata('message'); ?></strong> 
                            </div>
                        </center>
                    <?php endif; ?>
                    <div class="panel-body">
                        <?php if (!empty($available_rooms)): ?>
                            <?php foreach ($available_rooms as $key => $value) { ?>
                                <div class="col-md-4">
                                    <div class="panel panel-yellow">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="glyphicon glyphicon-bed fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h3>
                                                        <?php echo $available_rooms[$key]['room_name']; ?>
                                                        <small><?php echo $available_rooms[$key]['number']; ?></small>
                                                    </h3>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h3>
                                                        <small><?php echo $available_rooms[$key]['capacity']; ?> personas</small>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="panel-footer">
                                                <span class="pull-right">  
                                                    <a href="backend/reservas/ver-habitacion-reserva/<?php echo $available_rooms[$key]['number']; ?>/<?php echo $check_in; ?>/<?php echo $check_out; ?>"><i class="glyphicon glyphicon-pushpin"></i></a>
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
                        