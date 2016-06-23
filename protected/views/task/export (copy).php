<?php

if($type=="export-pdf"){
	$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4-L');
	$mPDF1->SetHeader("Liste des Taches");
	$mPDF1->SetFooter("Exporté le ".date("d/m/Y")."||{PAGENO}/{nb}");
	//$stylesheet = file_get_contents('http://localhost/TMS/css/print.css');
	//$mPDF1->WriteHTML($stylesheet, 1);
	$HTML = '<div class="titre">TABLEAU ILLUSTRATIF DES TRAVAUX EXECUTES PENDANT LA PERIODE DU '.$DateDebut[0].' AU '.$DateFin[0].'</div>';
	
	$ListActivity = array();
	$Activitys = Activity::model()->findAll();
	foreach($Activitys as $Activity)
		$ListActivity[$Activity->ActivID] = $Activity->ActivName;
	
	$ListService = array();
	$Services = Service::model()->findAll();
	foreach($Services as $Service)
		$ListService[$Service->ServID] = $Service->ServName;
	
	$ListMaintainer = array();
	$Maintainers = Maintainer::model()->findAll();
	foreach($Maintainers as $Maintainer)
		$ListMaintainer[$Maintainer->MaintainerID] = $Maintainer->MaintName;
	
	$ListClient = array();
	$Clients = Client::model()->findAll();
	foreach($Clients as $Client)
		$ListClient[$Client->ClientID] = $Client->CltName;
	foreach($listTask as $date=>$taskByTeam){
		$HTML .= '<div class="titreDate">Date du : '.$date.'</div>';
		foreach($taskByTeam as $team=>$ArrayTask){
			$HTML .= '<div class="titreTeam">Equipe : '.$team.'</div>';
			$HTML .= '<table class="list">
			<thead>
				<tr>
					<th style="width:80px">SERVICES</th>
					<th style="width:80px">ACTIVITES</th>
					<th style="width:110px">CLIENT</th>
					<th style="width:200px">TRAVAIL FAIT</th>
					<th style="width:70px">TIMING</th>
					<th style="width:200px">TRAVAIL RESTANT</th>
					<th style="width:200px">OBSERVATION</th>
				</tr>
			</thead>
			<tbody>';
				foreach($ArrayTask as $Task){
					$DD = explode(" ",$this->php2JsTimeFR($this->mySql2PhpTime($Task->TaskStart)));
					$DF = explode(" ",$this->php2JsTimeFR($this->mySql2PhpTime($Task->TaskEnd)));
					$HTML .= '
						<tr>
							<td>'.$ListService[$Task->RefServiceID].'</td>
							<td>'.$ListActivity[$Task->RefActivityID].'</td>
							<td>'.$ListClient[$Task->RefClientID].'</td>
							<td>'.$Task->TravailFait.'</td>
							<td>'.$DD[1].' à '.$DF[1].'</td>
							<td>'.$Task->TravailRestant.'</td>
							<td>'.$Task->TaskDescription.'</td>
						</tr>
					';
				}
			$HTML .= '</tbody>
			</table>';
		}
	}
	$HTML .= '
		<style>
			body{
				font-size:10px;
			}
			.titre{
				margin:10px auto;
				font-weight:bold;
			}
			.titreTeam{
				margin:10px auto;
				font-weight:bold;
			}
			.titreDate{
				margin:10px 0;
				font-weight:bold;
				font-size:13px;
			}
			table.list{
				width:100%;
				margin:10px 0;
			}
			table.list {
				border-collapse:collapse;
				table-layout:auto;
			}
			table.list td,table.list th{
				padding:3px;
				border:1px solid #e3e3e3;
			}
			table.list th{
				background-color:#f5f5f5;
			}
		</style>
	';
	$mPDF1->WriteHTML($HTML);
	$mPDF1->Output('Liste_des_Taches.pdf','D');
	
}else{

	Yii::import('ext.phpexcel.XPHPExcel');
	$objPHPExcel= XPHPExcel::createPHPExcel();
	$objPHPExcel->getProperties()->setCreator("Mahdi Mastouri")
						 ->setLastModifiedBy("Mahdi Mastouri")
						 ->setTitle("Office 2007 XLSX Test Document")
						 ->setSubject("Office 2007 XLSX Test Document")
						 ->setDescription("Export document for Office 2007 XLSX, generated using PHP classes.")
						 ->setKeywords("office 2007 openxml php")
						 ->setCategory("Export Task");			 
				
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);

	
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:H2');
	//$objPHPExcel->setActiveSheetIndex(0)->getStyle("A2")->getFont()->setBold(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', 'TABLEAU ILLUSTRATIF DES TRAVAUX EXECUTES PENDANT LA PERIODE DU '.$DateDebut[0].' AU '.$DateFin[0]);
	
	$objPHPExcel->getDefaultStyle()
				->getAlignment()
				->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel->getDefaultStyle()
				->getAlignment()
				->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->setActiveSheetIndex(0)->getDefaultStyle()->getAlignment()->setWrapText(true);
	
	$l = 3;
	foreach($ListTask as $ServiceID=>$TaskByActiv){
		$l++;
		$Service = Service::model()->findByPk($ServiceID);
		$ligneDebutService = $l;
		$objPHPExcel->setActiveSheetIndex(0)
					->mergeCells('A'.$l.':H'.$l)
					->setCellValue('A'.$l, 'Service '.$Service->ServName);
		$l+=2;
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$l, 'ACTIVITES')
					->setCellValue('B'.$l, 'DATE')
					->setCellValue('C'.$l, 'CLIENT')
					->setCellValue('D'.$l, 'TRAVAIL FAIT')
					->setCellValue('E'.$l, 'TIMING')
					->setCellValue('F'.$l, 'EQUIPE')
					->setCellValue('G'.$l, 'TRAVAIL RESTANT')
					->setCellValue('H'.$l, 'OBSERVATION');
		$ligneFinService = $l;
		$objPHPExcel->setActiveSheetIndex(0)->getStyle("A$ligneDebutService:H$ligneFinService")->getFont()->setBold(true);
		$l++;
		foreach($TaskByActiv as $ActivityID=>$ArrayTask){
			$Activity = Activity::model()->findByPk($ActivityID);
			$nbTask = count($ArrayTask);
			$mm = $l+$nbTask-1;
			$objPHPExcel->setActiveSheetIndex(0)->getStyle("A$l")->getFont()->setBold(true);
			foreach($ArrayTask as $Task){
				$DD = explode(" ",$this->php2JsTimeFR($this->mySql2PhpTime($Task->TaskStart)));
				$DF = explode(" ",$this->php2JsTimeFR($this->mySql2PhpTime($Task->TaskEnd)));
				$Equipe = "";
				foreach($Task->taskmaintainers as $TM){
					if($Equipe) $Equipe .= " & ";
					$Equipe .= $TM->refMaintainer->MaintName;
				}
				$objPHPExcel->setActiveSheetIndex(0)
							->mergeCells('A'.$l.':A'.$mm)
							->setCellValue('A'.$l, $Activity->ActivName)
							->setCellValue('B'.$l, $DD[0])
							->setCellValue('C'.$l, $Task->refClient->CltName)
							->setCellValue('D'.$l, $Task->TravailFait)
							->setCellValue('E'.$l, $DD[1].' à '.$DF[1])
							->setCellValue('F'.$l, $Equipe)
							->setCellValue('G'.$l, $Task->TravailRestant)
							->setCellValue('H'.$l, $Task->TaskDescription);
				$l++;
			}
		}
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Liste des Taches');
		 
		 
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	}
	
	// Redirect output to a client web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Liste_des_Taches.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	
	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
}
Yii::app()->end();
?>