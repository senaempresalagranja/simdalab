
<?php include '../../../../../assets/conexion/conexion.php'; ?>
 <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <!-- <th>Hora</th> -->
                            <th>Codigo Muestra</th>

                            <th>Visualizar</th>
                             <th>Eliminar</th>

                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                          $conexion->set_charset('utf8');
          $busqueda="SELECT 
          `id_Analisis_Muestra`,
 analisis_muestra.Fecha, 
    toma_muestra.identificacion_Muestra, 
 `ws`,
 `wa`,
 `wsw`,
 `ww`,
 `dw`,
 `t_Grados`,
 `Resul_mg_l`,
 `Pss`,
 `Pssp`,
 `Vd`,
 `Resul_a`,
 `factor_Correcion_T1`,
 `temperatura_1`,
 `densidad_1`,
 `peso_Muestra_1`,
 `Resul_3`,
 `factor_Correcion_T2`,
 `temperatura_2`,
 `densidad_2`,
 `peso_Muestra_2`,
 `Resul_4`,
 `arena`,
 `arcilla`,
 `Resul_5`,
 analisis_muestra.Textura, 
 `CarbonO`,
 `Resul_c`,
 `pH_Calcular`,
 `temperaturaPh`,
 `VolumenM`,
 `VolumenB`,
 `PesoM`,
 `NormalidadT`,
 `Resul_6`,
 `densi_real`,
 `densi_apa`,
 `resul_porosidad` FROM `analisis_muestra`
           INNER JOIN recepcion_muestra on analisis_muestra.id_Recepcion_Muestra=recepcion_muestra.id_Recepcion_Muestra 
           INNER join toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra

 ORDER BY `id_Analisis_Muestra` DESC";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){
             ?>

            <tr> 

<td ><?php echo $fila[1] ?></td>
<!-- <td ><?php echo $fila[2] ?></td> -->
<td ><?php echo $fila[2] ?></td>

                          


                          <td class='col-xs-2'>
                           <form style='float:left' action='mostrar/Mostrar-Analisis_Muestra.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              <button class="btn btn-primary icon-btn" type='submit' value='ver mas'><i class='fa fa-eye'></i>Ver Mas</button>
                           </form>
                           
                          </td>


                           <td ><?php echo "<div><a class='btn btn-danger' href='eliminar-analisis.php?id_Analisis_Muestra=".$fila['0']."'><i class='fa fa-lg fa-trash'></i></a></div>"?></td>
                          

                          

                           </tr>
    
             <?php 
}
   ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>      
      </div>

        
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        
      </div>
    <!-- Javascripts-->
    <div id="resultado"></div>
    <script src="../../../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../../../assets/js/essential-plugins.js"></script>
    <script src="../../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/plugins/pace.min.js"></script>
    <script src="../../../../assets/js/main.js"></script>
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
