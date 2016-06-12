    <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Reservaciones</h1>
                <?php if($this->session->flashdata('message') != null ): ?>
                    <center>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo $this->session->flashdata('message'); ?></strong> 
                        </div>
                    </center>
                <?php endif; ?>
            </div>
            <div>
                <form action="" role="form">
                    <div class="form-group col-md-6">
                        <label class="" for="">Fecha de entrada</label>
                        <input class="form-control datepicker" type="text" name="checkin" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="" for="">Fecha de salida</label>
                        <input class="datepicker form-control" type="text" name="checkout" />
                    </div>
                </form>
            </div>
            <div class="panel-body">
                <?php if(!empty($reserves)): ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Persona a cargo</th>
                                    <th>Cantidad de personas en la habitacion</th>
                                    <th>Telefono</th>
                                    <th>Desde</th>
                                    <th>Hasta</th>
                                    <th>Habitación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reserves as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $reserves[$key]['customerInfo']['name']; ?></td>
                                        <td><?php echo $reserves[$key]['cant_personas']; ?> personas</td>
                                        <td><?php echo $reserves[$key]['customerInfo']['telefono']; ?></td>
                                        <td><?php echo $reserves[$key]['check_in']; ?></td>
                                        <td><?php echo $reserves[$key]['check_out']; ?></td>
                                        <td><?php echo $reserves[$key]['roomNumber']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <h2>No hay reservaciones para hoy.</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>