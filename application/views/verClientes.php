 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Clientes</h1>
                        <?php if($this->session->flashdata('message') != null ): ?>
                            <center>
                                <div class="alert alert-success" role="alert">
                                    <strong><?php echo $this->session->flashdata('message'); ?></strong> 
                                </div>
                            </center>
                        <?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cedula</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($customers as $key => $value) { ?>
                                	<tr>
                                        <td><a href="backend/clientes/ver-cliente/<?php echo $customers[$key]['cedula'] ?>"><?php echo $customers[$key]['name']; ?></a></td>
                                        <td><?php echo $customers[$key]['cedula']; ?></td>
                                        <td><?php echo $customers[$key]['direccion']; ?></td>
                                        <td><?php echo $customers[$key]['telefono'] ?></td>
                                        <td><a href="backend/clientes/modificar-cliente/<?php echo $customers[$key]['cedula'] ?>"><span class="fa fa-pencil"></span></a></td>
                                        <td><a href="backend/clientes/eliminar-cliente/<?php echo $customers[$key]['cedula'] ?>"><span class="fa fa-trash-o"></span></a></td>
                                    </tr>
                                	<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>