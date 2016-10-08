        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Empleados <a href="<?php echo site_url('Empleados/add_empleados')?>"><i class="fa fa-fw fa-bar-chart-o"></i> ingresar Empleados</a>
                            
<?php
/*echo form_label('Employee Email-ID');



 $data_name = array(
'name' => 'emp_name',
'id' => 'emp_name_id',
'value' => 'John'
);
echo form_input($data_name);*/

/*$hidden = array('id' => $empleados);
echo form_open('email/send', '', $hidden);*/

$data_nombre = array(
    'name'  => 'nombre',
    'id'    => 'emp_nombre',
    'value' => ""
);


echo form_open("");
//echo form_label("Nombre");
//echo form_input($data_nombre);
//echo form_input(array('name' => 'nombre', 'id' => 'emp_nombre', 'value' => 'c'));
////secho form_input('title',set_value('title',$empleados->nombre));
//echo form_input('title',set_value((is_object($empleados)?$empleados->nombre:'')));

?>

<?php 
    //foreach ($empleados as $row ) {
        //echo $row['nombre'];
    //}
?>
<form>
  <div class="form-group">  
<?php
/*echo form_label('nombre');
    foreach ($empleados as $row) {
        echo '<div class="form-group">';
        echo form_input(array('name'=>'nombre', 'id'=>'emp_nombre','value'=>$row['nombre']));

        echo form_label('apellidos');
        echo form_input(array('name'=>'apellidos', 'id'=>'emp_apellidos', 'value'=>$row['apellidos']));
    }*/

  //echo '</div>';
  //echo '<div class="form-group">';
?>

</form>


<?php
//echo $empleados;
?>

<?php form_open('books/search');?>
<?php $search = array('name'=>'search','id'=>'search','value'=>'',);?>
<?=form_input($search);?><input type=submit value='Search' /></p>
<?=form_close();?>
<table>
<tr><th>ID</th><th>Nombre</th><th>Apelllidos</th><th>Published</th><th>Price</th></tr>
<?php foreach($query as $item):?>
<tr>
<td><?= $item->id ?></td>
<td><?= $item->nombre ?></td>
<td><?= $item->apellidos ?></td>
</tr>
<?php endforeach;?>
</table>


                        </h1>
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
