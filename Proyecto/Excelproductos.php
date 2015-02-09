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
$objSheet->setCellValue('A1', 'Codigo');
$objSheet->setCellValue('B1', 'Proveedor');
$objSheet->setCellValue('C1', 'Nombre Proveedor');
$objSheet->setCellValue('D1', 'Nombre Producto');
$objSheet->setCellValue('E1', 'Costo');
$objSheet->setCellValue('F1', 'X Mayor');
$objSheet->setCellValue('G1', 'Venta');
$objSheet->setCellValue('H1', 'Cantidad');
$objSheet->setCellValue('I1', 'Minimo');
$objSheet->setCellValue('J1', 'Seccion');
$objSheet->setCellValue('K1', 'Fecha');
$objSheet->setCellValue('L1', 'Estado');

	$numero=1;
	$can=mysql_query("SELECT * FROM producto");
	while($dato=mysql_fetch_array($can)){
		$numero++;
		$objSheet->setCellValue('A'.$numero, $dato['cod']);
		$objSheet->setCellValue('B'.$numero, $dato['prov']);
		$objSheet->setCellValue('C'.$numero, $dato['cprov']);
		$objSheet->setCellValue('D'.$numero, $dato['nom']);
		$objSheet->setCellValue('E'.$numero, $dato['costo']);
		$objSheet->setCellValue('F'.$numero, $dato['mayor']);
		$objSheet->setCellValue('G'.$numero, $dato['venta']);
		$objSheet->setCellValue('H'.$numero, $dato['cantidad']);
		$objSheet->setCellValue('I'.$numero, $dato['minimo']);
		$objSheet->setCellValue('J'.$numero, $dato['seccion']);
		$objSheet->setCellValue('K'.$numero, $dato['fecha']);
		$objSheet->setCellValue('L'.$numero, $dato['estado']);
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
$objXLS->getActiveSheet()->setTitle('PRODUCTO');
$objXLS->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
$objWriter->save(__DIR__ . "\Producto.xls");
echo 'Archivo Guardado en '.(__DIR__ . "\Producto.xls");


?>