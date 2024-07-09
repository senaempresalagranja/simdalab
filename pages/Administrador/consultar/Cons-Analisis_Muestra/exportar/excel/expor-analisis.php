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


$Fecha=$_POST["Fecha"];
$id_Toma_Muestra=$_POST["id_Toma_Muestra"];
$id_Finca=$_POST["id_Finca"];


$consulta="SELECT 
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
 `resul_porosidad`, 
 fincas.codigoFinca FROM `analisis_muestra`
           INNER JOIN recepcion_muestra on analisis_muestra.id_Recepcion_Muestra=recepcion_muestra.id_Recepcion_Muestra 
           INNER join toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra
           INNER JOIN lotes on toma_muestra.id_Lote=lotes.id_Lote
  
           INNER JOIN fincas on lotes.id_Finca=fincas.id_Finca

WHERE  analisis_muestra.Fecha LIKE '%$Fecha%'
AND toma_muestra.identificacion_Muestra LIKE '%$id_Toma_Muestra%' 
AND fincas.codigoFinca LIKE '%$id_Finca%'
-- AND municipios.nombre_Municipio LIKE '%$municipio%'
-- AND departamentos.nombre_Departamento LIKE '%$nombre_Departamento%'
-- AND toma_muestra.identificacion_Muestra LIKE '%$id_Toma_Muestra%' 
";

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
                             ->setTitle("Analisis de muestra")
                             ->setSubject("Analisis de muestra")
                             ->setDescription("Analisis de muestra")
                             ->setKeywords("Analisis de muestra")
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

        $tituloReporte = "Analisis de muestra ";


        $subtituloReporte = array(
            'Densidad Real',
            'Densidad Aparente', 
            'Porosidad',
            'Arena',
            'Arcilla',
            'Limo',
            'Carbono Organico',
            'Materia Organica',
            'pH',
        );


        $titulosColumnas = array('Codigo de muestra',
                                 'Codigo de Finca', 
                                 'Fecha',

                                 'Ws',
                                 'Wa',
                                 'wsw',
                                 'ww',
                                 'T',
                                 'dw',
                                 'Resul (mg/l)',

                                 'Pss',
                                 'Pssp',
                                 'Vd',
                                 'Resul_a',


                                 'Densidad Real',
                                 'Densidad Aparente ',
                                 'Resultado',


                                 'densidad 1 ',
                                 'Factor Correcion',
                                 'Temperatura 1',
                                 'Peso Muestra ',
                                 'Arena (%)',


                                 'densidad 2',
                                 'Factor Correcion 2',
                                 'Temperatura 2',
                                 'Peso Muestra',
                                 'Arcilla (%)',


                                 'Arena',
                                 'Arcilla',
                                 'Limo',
                                 'Textura',


                                 'Volumen Muestra ',
                                 'Volumen Blanco',
                                 'Peso Muestra',
                                 'Normalidad Titulante',
                                 'Resultado',


                                 'Carbono Organico ',
                                 'Resultado',


                                 'PH ',
                                 'Temperatura °C',




                                 );
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:AA1');

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:J2');  

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('K2:N2'); 

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('O2:Q2');  

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('R2:V2');  

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('W2:AA2');

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('AB2:AE2'); 

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('AF2:AJ2'); 

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('AK2:AL2');  

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('AM2:AN2');                                                                        
                        
        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1',$tituloReporte)

                    ->setCellValue('A2',$subtituloReporte[0])

                    ->setCellValue('K2',$subtituloReporte[1])

                    ->setCellValue('O2',$subtituloReporte[2])

                    ->setCellValue('R2',$subtituloReporte[3])

                    ->setCellValue('W2',$subtituloReporte[4])

                    ->setCellValue('AB2',$subtituloReporte[5])

                    ->setCellValue('AF2',$subtituloReporte[6])

                    ->setCellValue('AK2',$subtituloReporte[7])

                    ->setCellValue('AM2',$subtituloReporte[8])

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
                    ->setCellValue('AB3',  $titulosColumnas[27])
                    ->setCellValue('AC3',  $titulosColumnas[28])
                    ->setCellValue('AD3',  $titulosColumnas[29])
                    ->setCellValue('AE3',  $titulosColumnas[30])
                    ->setCellValue('AF3',  $titulosColumnas[31])
                    ->setCellValue('AG3',  $titulosColumnas[32])
                    ->setCellValue('AH3',  $titulosColumnas[33])
                    ->setCellValue('AI3',  $titulosColumnas[34])
                    ->setCellValue('AJ3',  $titulosColumnas[35])
                    ->setCellValue('AK3',  $titulosColumnas[36])
                    ->setCellValue('AL3',  $titulosColumnas[37])
                    ->setCellValue('AM3',  $titulosColumnas[38])
                    ->setCellValue('AN3',  $titulosColumnas[39])

                    ;

                    
        
        //Se agregan los datos de los alumnos
        $i = 4; // esto es para mostrar laos nombres de las columnas 
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    // ->setCellValue('A'.$i,  $fila['1'])
                    // ->setCellValue('B'.$i,  $fila['2'])
                    // ->setCellValue('C'.$i,  $fila['3'])
                    // ->setCellValue('D'.$i,  $fila['4']);

                    // Datos basicos 
                    ->setCellValue('A'.$i,  $fila['2'])
                    ->setCellValue('B'.$i,  $fila['40'])
                    ->setCellValue('C'.$i,  $fila['1'])

                    // Densidad Real
                    ->setCellValue('D'.$i,  $fila['3'])
                    ->setCellValue('E'.$i,  $fila['4'])
                    ->setCellValue('F'.$i,  $fila['5'])
                    ->setCellValue('G'.$i,  $fila['6'])
                    ->setCellValue('H'.$i,  $fila['7'])
                    ->setCellValue('I'.$i,  $fila['8'])
                    ->setCellValue('J'.$i,  $fila['9'])

                    // Densidad aparente
                    ->setCellValue('K'.$i,  $fila['10'])
                    ->setCellValue('L'.$i,  $fila['11'])
                    ->setCellValue('M'.$i,  $fila['12'])
                    ->setCellValue('N'.$i,  $fila['13'])


                    // Porosidad
                    ->setCellValue('O'.$i,  $fila['37'])
                    ->setCellValue('P'.$i,  $fila['38'])
                    ->setCellValue('Q'.$i,  $fila['39'])

                    // Arena
                    ->setCellValue('R'.$i,  $fila['16'])
                    ->setCellValue('S'.$i,  $fila['14'])
                    ->setCellValue('T'.$i,  $fila['15'])
                    ->setCellValue('U'.$i,  $fila['17'])
                    ->setCellValue('V'.$i,  $fila['18'])

                    // Arcilla
                    ->setCellValue('W'.$i,  $fila['21'])
                    ->setCellValue('X'.$i,  $fila['19'])
                    ->setCellValue('Y'.$i,  $fila['20'])
                    ->setCellValue('Z'.$i,  $fila['22'])
                    ->setCellValue('AA'.$i,  $fila['23'])

                    // limo
                    ->setCellValue('AB'.$i,  $fila['24'])
                    ->setCellValue('AC'.$i,  $fila['25'])
                    ->setCellValue('AD'.$i,  $fila['26'])
                    ->setCellValue('AE'.$i,  $fila['27'])

                    // Carvono Organico
                    ->setCellValue('AF'.$i,  $fila['32'])
                    ->setCellValue('AG'.$i,  $fila['33'])
                    ->setCellValue('AH'.$i,  $fila['34'])
                    ->setCellValue('AI'.$i,  $fila['35'])
                    ->setCellValue('AJ'.$i,  $fila['36'])

                    // Materia Organica
                    ->setCellValue('AK'.$i,  $fila['28'])
                    ->setCellValue('AL'.$i,  $fila['29'])

                    // ph
                    ->setCellValue('AM'.$i,  $fila['30'])
                    ->setCellValue('AN'.$i,  $fila['31'])
                    ;
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
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);

        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);

        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(15);

        
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
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:AN1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A2:AN2')->applyFromArray($estilosubtituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A3:AN3')->applyFromArray($estiloTituloColumnas);       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:AN".($i-1));
                
        for($i = 'A'; $i <= 'AN'; $i++){


            $objPHPExcel->setActiveSheetIndex(0)            
                ->getColumnDimension($i)->setAutoSize(false); // NO CAMBIAR A "TRUE" AL MENOS QUE QUIERAS QUE LAS CELDAS SE ACOMODEN AUTOMATICAMENTE AUNQUE NO ES MUY RECOMENDABLE POR QUE GENERA ALGUNOS PROBLEMAS AL MOEMENTO DE QUERER AJUSTAR EL ANCHO MANUALMENTE
        }
        
        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Analisis de muestra');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        // el 0 equilale a las filas
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Analisis de muestra Registradas (Simdalab).xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
        
    }
    else{
        print_r('No hay resultados para mostrar');
    }
?>