
<?php include '../../../../../assets/conexion/conexion.php'; ?>

<table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                 <tr>
                                    <th>Tipo de Programa</th>
                                    <th>Programa</th>
                                    <th>Eliminar</th>

                                 
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                       
                                $busqueda="SELECT `id_Programa`, tipo_programa.Tipo, `nombre_Programa` FROM `programas`
                                INNER JOIN tipo_programa ON programas.id_Tipo_Programa=tipo_programa.id_Tipo_Programa ORDER BY `programas`.`id_Programa` DESC";
     
                                $query=mysqli_query($conexion,$busqueda);
                                while ($fila=mysqli_fetch_row($query)){

                                  echo "<tr> ";
                                  echo "<td>$fila[1]  </td>";
                                  echo "<td>$fila[2]  </td>";    
                                   echo "<td><div><a class='btn btn-danger' href='Eliminar-ficha.php?id_Ficha=".$fila['0']."'><i class='fa fa-lg fa-trash'></i></a></div></td>";

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