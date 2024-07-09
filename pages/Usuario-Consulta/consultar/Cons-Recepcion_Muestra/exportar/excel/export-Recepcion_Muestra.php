<?php

    include '../../../../../../assets/conexion/conexion.php';


// consulta


$Fecha=$_POST["Fecha"];
$id_Toma_Muestra=$_POST["id_Toma_Muestra"];

$consulta="SELECT `id_Recepcion_Muestra`, `Fecha`, recepcion_muestra.Hora, toma_muestra.identificacion_Muestra, recepcion_muestra.Humedad, `Textura`, `ph_Muestra`, `densidad_Aderente`, `densidad_Real`, `porosidad`, `retencion_Humedad`, `distrubucion_tamanos`, `cationes_Intercambiables`, `elementos_Menores`, `materia_Organica`, `carbono_organico`, `CIC`, `Otros`, `muestra_Entregada_Por`, `muestra_Recibida_Por`, recepcion_muestra.Observaciones FROM `recepcion_muestra` 
          INNER JOIN toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra

WHERE Fecha LIKE '%$Fecha%'
AND toma_muestra.identificacion_Muestra LIKE '%$id_Toma_Muestra%' ";

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
                             ->setTitle("Recepcion De Muestra")
                             ->setSubject("Recepcion De Muestra")
                             ->setDescription("Recepcion De Muestra")
                             ->setKeywords("Recepcion De Muestra")
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

        $tituloReporte = "Recepcion De Muestras ";


                $subtituloReporte = array(
            'Analisis a realizar',
            'Recepcion Muestras', 

        );

        $titulosColumnas = array('Codigo de muestra',
                                 'Fecha',
                                 'Hora',
                                 'Humemdad',
                                 'Textura',
                                 'pH',
                                 'Densidad Aderente',
                                 'Densidad Real',
                                 'Porosidad',
                                 'Retención Humedad',
                                 'distrubucion Tamaños',
                                 'Cationes Intercambiables',
                                 'Elementos Menores',
                                 'Materia Organica',
                                 'Carbono Organico',
                                 'CIC',
                                 'Otros ',
                                 'Muestra Entregada Por',
                                 'Muestra Recibida Por',
                                 'Observaciones'
                                 
                                 );
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:T1');

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:Q2');  

        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('R2:T2'); 
                                                        
                        
        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1',$tituloReporte)

                    ->setCellValue('A2',$subtituloReporte[0])

                    ->setCellValue('R2',$subtituloReporte[1])


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

                    ;

                    
        
        //Se agregan los datos de los alumnos
        $i = 4; // esto es para mostrar laos nombres de las columnas 
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    // ->setCellValue('A'.$i,  $fila['1'])
                    // ->setCellValue('B'.$i,  $fila['2'])
                    // ->setCellValue('C'.$i,  $fila['3'])
                    // ->setCellValue('D'.$i,  $fila['4']);

                    ->setCellValue('A'.$i,  $fila['3'])
                    ->setCellValue('B'.$i,  $fila['1'])
                    ->setCellValue('C'.$i,  $fila['2'])
                    ->setCellValue('D'.$i,  $fila['4'])
                    ->setCellValue('E'.$i,  $fila['5'])
                    ->setCellValue('F'.$i,  $fila['6'])
                    ->setCellValue('G'.$i,  $fila['7'])
                    ->setCellValue('H'.$i,  $fila['8'])
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
                    ->setCellValue('T'.$i,  $fila['20']);
                    $i++;
        }


        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(60);

        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
        $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(30);


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(17);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(16);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(40);       
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(40);              


        
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


        ));
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:T1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A2:T2')->applyFromArray($estilosubtituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A3:T3')->applyFromArray($estiloTituloColumnas);       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:T".($i-1));
                
        for($i = 'A'; $i <= 'T'; $i++){


            $objPHPExcel->setActiveSheetIndex(0)            
                ->getColumnDimension($i)->setAutoSize(false); // NO CAMBIAR A "TRUE" AL MENOS QUE QUIERAS QUE LAS CELDAS SE ACOMODEN AUTOMATICAMENTE AUNQUE NO ES MUY RECOMENDABLE POR QUE GENERA ALGUNOS PROBLEMAS AL MOEMENTO DE QUERER AJUSTAR EL ANCHO MANUALMENTE
        }
        
        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Recepcion De Muestra');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        // el 0 equilale a las filas
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Recepcion De Muestra Registradas (Simdalab).xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
        
    }
    else{
        print_r('No hay resultados para mostrar');
    }
?>