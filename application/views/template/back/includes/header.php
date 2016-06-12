<!DOCTYPE html>
<html lang="en">

<head>
   <base href="<?php echo "http://".$_SERVER['SERVER_NAME']."/"; ?>"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>


    <!-- Bootstrap Core CSS -->
    <link href="assets/back/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- MetisMenu CSS -->
    <link href="assets/back/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="assets/back/dist/css/sb-admin-2.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="assets/back/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/back/css/style.css">

    <link rel="stylesheet" href="assets/back/bootstrap-datepicker/css/bootstrap-datepicker3.css"/>

</head>

<body>

    <div id="wrapper">

        <!-- Navegacion -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Hotel Pascal</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $user->name; ?> <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Ver perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="signin/logout"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <!-- Home -->
                        <li class="active">
                            <a class="active" href="backend/reservas/reservas-de-hoy"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <!-- /.Home -->
                        
                        <!-- Habitaciones -->
                        <li>
                            <a href="#"><span class="glyphicon glyphicon-bed"></span> Habitaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if($user->user_role == 1): ?>
                                    <li>
                                        <a href="backend/habitaciones/nueva-habitacion">Crear habitación (solo admin)</a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="backend/habitaciones/ver-habitaciones">Ver habitaciones</a>
                                </li>
                            </ul>
                        </li>
                        <!-- /.Habitaciones -->

                        <!-- Clientes -->
                        <li>
                            <a href="#"><i class="fa fa-male fa-fw"></i> Clientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="backend/clientes/nuevo-cliente">Crear cliente</a>
                                </li>
                                <li>
                                    <a href="backend/clientes/ver-clientes">Ver clientes</a>
                                </li>
                            </ul>                            
                        </li>
                        <!-- /.Clientes -->

                        <!-- Reservaciones -->
                        <li>
                            <a href="#"><i class="fa fa-pencil fa-fw"></i> Reservaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="backend/reservas/verificar-disponibilidad">Crear reservación</a>
                                </li>
                                <li>
                                    <a href="backend/reservas/ver-reservas">Ver reservaciones</a>
                                </li>
                            </ul>
                        </li>
                        <!-- /.Reservaciones -->

                        <?php if($user->user_role == 1): ?>
                             <!-- Usuarios -->
                            <li>
                                <a href="#"><i class="fa fa-group fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="backend/usuarios/nuevo-usuario">Crear usuario</a>
                                    </li>
                                    <li>
                                        <a href="backend/usuarios/ver-usuarios">Ver usuarios</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?> 
                        <!-- /.Usuarios -->
                    </ul>
                </div>
            </div>
        </nav>