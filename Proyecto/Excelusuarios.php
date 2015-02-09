<?php
error_reporting(E_ALL);
include_once 'Classes/PHPExcel.php';
////////////////////////CONEXION//////////////////////////////
	///localhost, nombre del servidor<br />
	///root, nombre de la cuenta de usuario<br />
	/// '' contraseña, sino tiene deje vacio
	///BD, nombre de la base de datos
	$conexion = mysql_connect("mysql8.000webhost.com","a6591137_prueba","fabi1423");
	mysql_select_db("a6591137_prueba",$conexion);
	
/////////////////////////////////////////////////////////////
$objXLS = new PHPExcel();
$objSheet = $objXLS->setActiveSheetIndex(0);
////////////////////TITULOS///////////////////////////
$objSheet->setCellValue('A1', 'ced');
$objSheet->setCellValue('B1', 'estado');
$objSheet->setCellValue('C1', 'nom');
$objSheet->setCellValue('D1', 'dir');
$objSheet->setCellValue('E1', 'tel');
$objSheet->setCellValue('F1', 'cel');
$objSheet->setCellValue('G1', 'cupo');
$objSheet->setCellValue('H1', 'barrio');
$objSheet->setCellValue('I1', 'ciudad');
$objSheet->setCellValue('J1', 'usu');
$objSheet->setCellValue('K1', 'con');
$objSheet->setCellValue('L1', 'tipo');

	$numero=1;
	$can=mysql_query("SELECT * FROM USUARIOS");
	while($dato=mysql_fetch_array($can)){
		$numero++;
		$objSheet->setCellValue('A'.$numero, $dato['ced');]);
		$objSheet->setCellValue('B'.$numero, $dato['estado']);
		$objSheet->setCellValue('C'.$numero, $dato['nom']);
		$objSheet->setCellValue('D'.$numero, $dato['dir']);
		$objSheet->setCellValue('E'.$numero, $dato['tel']);
		$objSheet->setCellValue('F'.$numero, $dato['cel']);
		$objSheet->setCellValue('G'.$numero, $dato['cupo']);
		$objSheet->setCellValue('H'.$numero, $dato['barrio']);
		$objSheet->setCellValue('I'.$numero, $dato['ciudad']);
		$objSheet->setCellValue('J'.$numero, $dato['usu']);
		$objSheet->setCellValue('K'.$numero, $dato['con']);
		$objSheet->setCellValue('L'.$numero, $dato['tipo']);
	}                            
	
	
$objXLS->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);
$objXLS->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);
$objXLS->getActiveSheet()->setTitle('USUARIOS');
$objXLS->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
$objWriter->save(__DIR__ . "\Usuarios.xls");
echo 'Archivo Guardado en '.(__DIR__ . "\Usuarios.xls");


?>