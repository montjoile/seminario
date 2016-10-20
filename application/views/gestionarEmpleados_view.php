        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gestionar Empleados 
                        </h1>


  <div class="form-group">  



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



               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>
