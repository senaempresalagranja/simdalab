
<?php include '../../../../../assets/conexion/conexion.php'; ?>

<table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          <tr>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Vereda</th>
                            <th>Nombre</th>
                            <th>Tamaño (H.A) </th>
                            <th>Numero Telefono</th>
                            <th>Correo</th>
                            <th>Codigo Finca</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $conexion->set_charset('utf8');
          $busqueda="SELECT `id_Finca`, veredas.nombre_Vereda, municipios.nombre_Municipio, departamentos.nombre_Departamento, `nombre_Finca`, `Tamano`, `numero_Telefono`, `correo_Electronico`, `codigoFinca` FROM `fincas`

INNER JOIN veredas ON fincas.id_Vereda=veredas.id_Vereda 
INNER JOIN municipios ON veredas.id_Municipio=municipios.id_Municipio 
INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento 
ORDER BY `fincas`.`id_Finca` DESC";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){

            echo "<tr> ";

            echo "<td>$fila[3]  </td>";
            echo "<td>$fila[2]  </td>";
            echo "<td>$fila[1] </td>";
            echo "<td>$fila[4] </td>";          
            echo "<td>$fila[5] </td>";
            echo "<td>$fila[6] </td>";
            echo "<td>$fila[7] </td>";
            echo "<td>$fila[8] </td>";
             echo "<td><div><a class='btn btn-danger' href='eliminar-finca.php?id_Finca=".$fila['0']."'><i class='fa fa-lg fa-trash'></i></a></div></td>";
            echo "</tr>";

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