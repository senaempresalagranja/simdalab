
<?php include '../../../../../assets/conexion/conexion.php'; ?>

<table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Identificacion De La Muestra</th>

                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                          $conexion->set_charset('utf8');
          $busqueda="SELECT `id_Recepcion_Muestra`, `Fecha`, recepcion_muestra.Hora, toma_muestra.identificacion_Muestra, recepcion_muestra.Humedad, `Textura`, `ph_Muestra`, `densidad_Aderente`, `densidad_Real`, `porosidad`, `retencion_Humedad`, `distrubucion_tamanos`, `cationes_Intercambiables`, `elementos_Menores`, `materia_Organica`, `CIC`, `Otros`, `muestra_Entregada_Por`, `muestra_Recibida_Por`, recepcion_muestra.Observaciones FROM `recepcion_muestra` 
          INNER JOIN toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra

ORDER BY `recepcion_muestra`.`id_Recepcion_Muestra` DESC";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){
             ?>

            <tr> 

<td ><?php echo $fila[1] ?></td>
<td ><?php echo $fila[2] ?></td>
<td ><?php echo $fila[3] ?></td>

                          


                          <td class='col-xs-2'>
                           <form style='float:left' action='mostrar/Mostrar-Recepcion_Muestra.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              <button class="btn btn-primary icon-btn" type='submit' value='ver mas'><i class='fa fa-eye'></i>Ver Mas</button>
                           </form>
                           
                          </td>

                          

                           </tr>
    
             <?php 
}
   ?>
                        </tbody>
                      </table>



<script src="../../../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../../../assets/js/essential-plugins.js"></script>
    <script src="../../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/plugins/pace.min.js"></script>
    
    <script type="text/javascript" src="../../../../assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable( {
    language: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
    }
} );

    </script>