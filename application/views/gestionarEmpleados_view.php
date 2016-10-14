        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Empleados <a href="<?php echo site_url('Empleados/add_empleados')?>"><i class="fa fa-fw fa-bar-chart-o"></i> Gestionar Empleados</a></h1>


  <div class="form-group">  


<?php form_open('books/search');?>
<?php $search = array('name'=>'search','id'=>'search','value'=>'',);?>
<?=form_input($search);?><input type=submit value='Search' /></p>
<?=form_close();?>
<table>
<tr><th>Nombre</th><th>Profesion</th><th>Fecha de contrato</th><th>Fecha de vigencia</th><th>Salario</th><th></th></tr>
<?php foreach($empleados as $empleado):?>
<tr>
<!--<td><?//= $empleado->id ?></td>-->
<td><?= $empleado->nombre . " " . $empleado->apellidos ?></td>
<td><?= $empleado->profesion ?></td>
<td><?= $empleado->fecha_contrato ?></td>
<td><?= $empleado->fecha_vigencia ?></td>
<td><?= $empleado->salario ?></td>
<td><?= $empleado->id ?> </td>
<td><a href="<?php echo site_url('Empleados/detalle_empleado').'/'.$empleado->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

</tr>
<?php endforeach;?>
</table>


                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>New Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>New Tasks!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    
                    
                </div>
                

               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>
