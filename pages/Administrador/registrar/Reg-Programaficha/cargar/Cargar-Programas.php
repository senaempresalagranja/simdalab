<?php include '../../../../../assets/conexion/conexion.php'; ?> 

                          <div class="form-group">
                            <label class="control-label" for="id_Programa">Programa</label>
                            <select class="form-control" id="id_Programa" onclick="">
                              <option value="Selecciona">Selecciona el Programa</option>
                              <?php  
                      
                      $query="SELECT `id_Programa`, tipo_programa.Tipo, `nombre_Programa` FROM `programas`

INNER JOIN tipo_programa ON programas.id_Tipo_Programa=tipo_programa.id_Tipo_Programa";
                      $resource=mysqli_query($conexion,$query);
                      while ($fila=mysqli_fetch_row($resource)) {
                      echo " <option value='$fila[0]'> $fila[2]- $fila[1] </option> ";
                      }
                      ?>
                            </select>
                          </div>