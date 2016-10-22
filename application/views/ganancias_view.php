        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ganancias Facturadas 
                        </h1>






<table class="table table-bordered">
<tr class="active"><th>Mes </th><th> Salario Facturado </th><th> IVA </th> <th> Comision </th></tr>
<?php foreach($ganancias as $item):?>
<tr>
<td><?= $item->mes ?></td>
<td><?= $item->salario ?></td>
<td><?= $item->iva ?></td>
<td><?= $item->comision ?></td>

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
