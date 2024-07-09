<?php

    include '../../../../../../assets/conexion/conexion.php';
    // if (mysqli_connect_errno()) {
    //     printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    //     exit();
    // }
    // $consulta = "SELECT `idAlimentacion`, galpon.NombreGalpon, articulos.Nombre, alimentacion.Cantidad, `Fecha`, `Hora` FROM `alimentacion` INNER JOIN encasetamiento ON alimentacion.idEncasetamiento=encasetamiento.idEncasetamiento INNER JOIN articulos ON alimentacion.idArticulo=articulos.idArticulo INNER JOIN galpon ON encasetamiento.idGalpon=galpon.idGalpon     ORDER BY Fecha";
    // $resultado = $conexion->query($consulta);
    // if($resultado->num_rows > 0 ){


// consulta


$identificacion_Muestra=$_POST["identificacion_Muestra"];

$consulta="SELECT `id_Toma_Muestra`, 
`fecha_Toma`, 
`Hora`, 
programas.nombre_Programa,
tipo_programa.Tipo, 
fichas.numero_Ficha , 
`Proyecto`, 
instructores.nombre_Instructor,
`identificacion_Muestra`, 
departamentos.nombre_Departamento,
municipios.nombre_Municipio,
veredas.nombre_Vereda,
fincas.nombre_Finca ,
lotes.nombre_Lote, 
`tipo_Topografia`, 
`profundidad_Muestra`, 
`Humedad`, 
`fuerza_penetracion`, 
`profundidad_Campo`, 
`Norte`, 
`Occidente`,
 `Altura`, 
 `responsable_Toma`, 
 `Empresa`, 
 toma_muestra.correo_Electronico, 
 `Telefono`, 
 `responsable_Recibido`, 
 `Observaciones` FROM `toma_muestra`

INNER JOIN fichas on toma_muestra.id_Ficha=fichas.id_Ficha

INNER JOIN programas on fichas.id_Programa=programas.id_Programa

INNER JOIN tipo_programa on programas.id_Tipo_Programa=tipo_programa.id_Tipo_Programa

INNER JOIN instructores ON toma_muestra.id_Instructor=instructores.id_Instructor

INNER JOIN lotes on toma_muestra.id_Lote=lotes.id_Lote

INNER join fincas on lotes.id_Finca=fincas.id_Finca

INNER join veredas on fincas.id_Vereda=veredas.id_Vereda

INNER join municipios on veredas.id_Municipio=municipios.id_Municipio

INNER join departamentos on municipios.id_Departamento=departamentos.id_Departamento

WHERE identificacion_Muestra LIKE '%$identificacion_Muestra%'";

$resultado = $conexion->query($consulta);
    if($resultado->num_rows > 0 ){

                        
        date_default_timezone_set('America/Mexico_City');

        if (PHP_SAPI == 'cli')
            die('Este archivo solo se puede ver desde un navegador web');

        /** Se agrega la libreria PHPExcel */
        require_once '../../../../../../assets/lib/PHPExcel/Classes/PHPExcel.php';

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Simdalab") //Autor
                             ->setLastModifiedBy("Simdalab") //Ultimo usuario que lo modificó
                             ->setTitle("Toma De Muestras")
                             ->setSubject("Toma De Muestras")
                             ->setDescription("Toma De Muestras")
                             ->setKeywords("Toma De Muestras")
                             ->setCategory("Reporte excel");

        // 3) Escribiendo data
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Simdalab');
        $objDrawing->setDescription('');
        $objDrawing->setPath('../../../../../../assets/imagenes/Sindalab.png');     
        $objDrawing->setHeight(60);             
        $objDrawing->setCoordinates('A1');   
        $objDrawing->setOffsetX(8);     
        $objDrawing->setOffsety(10);           
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());                       

        $tituloReporte = "Toma De Muestras ";




        $subtituloReporte = array(
            'Datos Basicos',
            'Identificacion', 
            'Datos De Campo',
            'Responsable De La Toma',
            'Responsable De Recibir La Toma',
        );
        $titulosColumnas = array('Codigo de muestra',
                                 'Fecha',
                                 'Hora',
                                 'Programa De Formacion',
                                 'Tipo De Programa',
                                 'Ficha',
                                 'Proyecto',
                                 'Instructor',
                                 'Departamento',
                                 'Municipio',
                                 'Vereda',
                                 'Finca',
                                 'Lote',
                                 'Topografia',
                                 'Profundidad',
                                 'Humedad',
                                 'Fuerza Penetracion ',
                                 'Profundidad Campo',
                                 'Norte',
                                 'Occidente',
                                 'Altura',
                                 'Nombre Responsable',
                                 'Empresa',
                                 'Correo',
                                 'Telelfono',
                                 'Nombre Responsable',
                                 'Observaciones',
                                 );
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:AA1');

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:H2');  

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('I2:O2'); 

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('P2:U2');  

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('V2:Y2');  

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('Z2:AA2');                                                            
                        
        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1',$tituloReporte)

                    ->setCellValue('A2',$subtituloReporte[0])

                    ->setCellValue('I2',$subtituloReporte[1])

                    ->setCellValue('P2',$subtituloReporte[2])

                    ->setCellValue('V2',$subtituloReporte[3])

                    ->setCellValue('Z2',$subtituloReporte[4])

                    ->setCellValue('A3',  $titulosColumnas[0])
                    ->setCellValue('B3',  $titulosColumnas[1])
                    ->setCellValue('C3',  $titulosColumnas[2])
                    ->setCellValue('D3',  $titulosColumnas[3])
                    ->setCellValue('E3',  $titulosColumnas[4])
                    ->setCellValue('F3',  $titulosColumnas[5])
                    ->setCellValue('G3',  $titulosColumnas[6])
                    ->setCellValue('H3',  $titulosColumnas[7])
                    ->setCellValue('I3',  $titulosColumnas[8])
                    ->setCellValue('J3',  $titulosColumnas[9])
                    ->setCellValue('K3',  $titulosColumnas[10])
                    ->setCellValue('L3',  $titulosColumnas[11])
                    ->setCellValue('M3',  $titulosColumnas[12])
                    ->setCellValue('N3',  $titulosColumnas[13])
                    ->setCellValue('O3',  $titulosColumnas[14])
                    ->setCellValue('P3',  $titulosColumnas[15])
                    ->setCellValue('Q3',  $titulosColumnas[16])
                    ->setCellValue('R3',  $titulosColumnas[17])
                    ->setCellValue('S3',  $titulosColumnas[18])
                    ->setCellValue('T3',  $titulosColumnas[19])
                    ->setCellValue('U3',  $titulosColumnas[20])
                    ->setCellValue('V3',  $titulosColumnas[21])
                    ->setCellValue('W3',  $titulosColumnas[22])
                    ->setCellValue('X3',  $titulosColumnas[23])
                    ->setCellValue('Y3',  $titulosColumnas[24])
                    ->setCellValue('Z3',  $titulosColumnas[25])
                    ->setCellValue('AA3',  $titulosColumnas[26])

                    ;

                    
        
        //Se agregan los datos de los alumnos
        $i = 4; // esto es para mostrar laos nombres de las columnas 
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    // ->setCellValue('A'.$i,  $fila['1'])
                    // ->setCellValue('B'.$i,  $fila['2'])
                    // ->setCellValue('C'.$i,  $fila['3'])
                    // ->setCellValue('D'.$i,  $fila['4']);

                    ->setCellValue('A'.$i,  $fila['8'])
                    ->setCellValue('B'.$i,  $fila['1'])
                    ->setCellValue('C'.$i,  $fila['2'])
                    ->setCellValue('D'.$i,  $fila['3'])
                    ->setCellValue('E'.$i,  $fila['4'])
                    ->setCellValue('F'.$i,  $fila['5'])
                    ->setCellValue('G'.$i,  $fila['6'])
                    ->setCellValue('H'.$i,  $fila['7'])
                    ->setCellValue('I'.$i,  $fila['9'])
                    ->setCellValue('J'.$i,  $fila['10'])
                    ->setCellValue('K'.$i,  $fila['11'])
                    ->setCellValue('L'.$i,  $fila['12'])
                    ->setCellValue('M'.$i,  $fila['13'])
                    ->setCellValue('N'.$i,  $fila['14'])
                    ->setCellValue('O'.$i,  $fila['15'])
                    ->setCellValue('P'.$i,  $fila['16'])
                    ->setCellValue('Q'.$i,  $fila['17'])
                    ->setCellValue('R'.$i,  $fila['18'])
                    ->setCellValue('S'.$i,  $fila['19'])
                    ->setCellValue('T'.$i,  $fila['20'])
                    ->setCellValue('U'.$i,  $fila['21'])
                    ->setCellValue('V'.$i,  $fila['22'])
                    ->setCellValue('W'.$i,  $fila['23'])
                    ->setCellValue('X'.$i,  $fila['24'])
                    ->setCellValue('Y'.$i,  $fila['25'])
                    ->setCellValue('Z'.$i,  $fila['26'])
                    ->setCellValue('AA'.$i,  $fila['27']);
                    $i++;
        }


        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(60);

        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
        $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(30);

        // $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(23);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(23);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(52000);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22000);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(22000);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(100000000000);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(17);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(40);


        
        $estiloTituloReporte = array(
            'font' => array(
                'name'      => 'Quicksand',
                'bold'      => true,
                'italic'    => false,
                'strike'    => false,
                'size' =>18,
                    'color'     => array(
                        'rgb' => 'FFFFFF'
                    )
            ),
            'fill' => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => '28b31d')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_NONE                    
                )
            ), 
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation'   => 0,
                    'wrap'          => true 
            ),

        );

        $estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Quicksand',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => '555555'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array(
                    'rgb' => '28b31d'
                ),
                'endcolor'   => array(
                    'argb' => 'FFFFFF'
                )
            ),
            'borders' => array(
                'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '28b31d'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                )
            ),
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => TRUE
            ));
            

            $estilosubtituloReporte = array(
            'font' => array(
                'name'      => 'Quicksand',
                'bold'      => true,
                'italic'    => false,
                'strike'    => false,
                'size' =>13,
                    'color'     => array(
                        'rgb' => 'FFFFFF'
                    )
            ),
            'fill' => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => '28b31d')
            ),
            'borders' => array(
                'allborders'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN ,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ) 

            ), 
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation'   => 0,
                    'wrap'          => true 
            ),

        );
            

        $estiloInformacion = new PHPExcel_Style();
        $estiloInformacion->applyFromArray(
            array(
                'font' => array(
                'name'      => 'Quicksand',               
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                'color'     => array('argb' => 'FFFFFF')
            ),
            'borders' => array(
                'allborders'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN ,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ) 

            )

      //        'alignment' =>  array(
      //            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      //            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
      //            'rotation'   => 0,
      //            'wrap'          => true 
            // ),

        ));
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:AA1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A2:AA2')->applyFromArray($estilosubtituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A3:AA3')->applyFromArray($estiloTituloColumnas);       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:AA".($i-1));
                
        for($i = 'A'; $i <= 'AA'; $i++){


            $objPHPExcel->setActiveSheetIndex(0)            
                ->getColumnDimension($i)->setAutoSize(false); // NO CAMBIAR A "TRUE" AL MENOS QUE QUIERAS QUE LAS CELDAS SE ACOMODEN AUTOMATICAMENTE AUNQUE NO ES MUY RECOMENDABLE POR QUE GENERA ALGUNOS PROBLEMAS AL MOEMENTO DE QUERER AJUSTAR EL ANCHO MANUALMENTE
        }
        
        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Toma De Muestras');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        // el 0 equilale a las filas
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Toma De Muetras Registradas (Simdalab).xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
        
    }
    else{
        print_r('No hay resultados para mostrar');
    }
?>