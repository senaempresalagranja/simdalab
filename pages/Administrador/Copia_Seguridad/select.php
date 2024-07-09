
<?php 
include 'Connet.php';
 ?>
				<div class="col-xs-12  col-md-8 col-lg-offset-2">
				  <div class="form-group">
					<label class="form-control-label" for="">Seleciona un punto de restauracion</label>

					<select name="restaurar" id="restaurar" class="form-control">
					  <option value="Selecciona" >Selecciona</option>
						<?php
						  $ruta=BACKUP_PATH;
						  if(is_dir($ruta)){
				    		  if($aux=opendir($ruta)){
				        		  while(($archivo = readdir($aux)) !== false){
				            		  if($archivo!="."&&$archivo!=".."){
				                		  $nombrearchivo=str_replace(".sql", "", $archivo);
				                		  $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                		  $ruta_completa=$ruta.$archivo;
				                		  if(is_dir($ruta_completa)){
				                		  }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                		  }
				            		  }
				        		  }
				        		  closedir($aux);
				    		  }
						  }else{
				    		  echo $ruta." No es ruta válida";
						  }
						?>
					</select>
				  </div>	
			    </div>