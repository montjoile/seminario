<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('start')?>">Sistema de Outsourcing de Personal</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

<li class="dropdown">
                    <a href="<?php echo site_url('login')?>" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Login<b class="caret"></b></a>

<ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url('login/actualiza_perfil')?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>


