        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Empleados <!--<a href="<?php echo site_url('Empleados/add_empleados')?>"><i class="fa fa-fw fa-bar-chart-o"></i> ingresar Empleados</a>-->
                        </h1>
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
<tr><th>ID </th><th> Nombre </th><th> Apelllidos </th><th></th></tr>
<?php foreach($query as $item):?>
<tr>
<td><?= $item->id ?></td>
<td><?= $item->nombre ?></td>
<td><?= $item->apellidos ?></td>
<td><?= $item->profesion ?></td>
<td><a href="<?php echo site_url('Empleados/detalle_empleado').'/'.$item->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true">Detalle</i></a></td>

</tr>
<?php endforeach;?>
</table>


                        
                        
                    
                    
                </div>
                

               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>
