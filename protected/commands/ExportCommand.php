<?php
class ExportCommand extends CConsoleCommand {         
	public function run($args=array())        
	{            // Do stuff         
		//$this->layout = 'ajax';
		$mode='F';
		$service=$args[0];
		$model=new Task('search');
				
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Task']))
			$model->attributes=$_GET['Task'];
		
		$pagination = false;
		$criteria=new CDbCriteria;
		$criteria->condition = "(RefServiceID = :RefServiceID AND DATE(TaskEnd) = :TaskEnd)";
		$criteria->params = array(":RefServiceID"=>$service,":TaskEnd"=>date("Y-m-d"));
		$criteria->order = "TaskStart ASC";

		$dataProvider = $model->search($criteria,$pagination);
		$data = $dataProvider->data;
		
		$taskByTeam=array();
		$DateDebut = 0;
		$DateFin = 0;
		
		$listTask=array();
		foreach ($data  as $Task) {
			$DD = explode(" ",$this->php2JsTimeFR($this->mySql2PhpTime($Task->TaskStart)));
			if(!isset($listTask[$DD[0]])) $listTask[$DD[0]]=array();
			$assignedUser=$Task->assignedTo->UserName;
			$taskmaintainers = $Task->taskmaintainers;
			$equipe='';
			foreach($taskmaintainers as $maintainer){
				if($equipe) $equipe .= " & ";
					$equipe .= $maintainer->refMaintainer->MaintName;
			}
			$equipe=(empty($equipe))?$assignedUser:$equipe;
			if(!isset($listTask[$DD[0]][$equipe])) $listTask[$DD[0]][$equipe]=array();
			$listTask[$DD[0]][$equipe][]=$Task;
			
			//for finding the date debut and fin	
			$TaskStart = $this->mySql2PhpTime($Task->TaskStart);
			$TaskEnd = $this->mySql2PhpTime($Task->TaskEnd);
			if(!$DateDebut || $DateDebut>$TaskStart) $DateDebut = $TaskStart;
			if(!$DateFin || $DateFin<$TaskEnd) $DateFin = $TaskEnd;	
		}
		
		
		$DateDebut = explode(" ",$this->php2JsTimeFR($DateDebut));
		$DateFin = explode(" ",$this->php2JsTimeFR($DateFin));
		
		//getting the service name array
		$ListService = array();
		$Services = Service::model()->findAll();
		foreach($Services as $Service)
			$ListService[$Service->ServID] = $Service->ServName;
		
		//specify the output mode : download or saving
		
	//	exit('exit');
		$this->pdf($listTask,
				$DateDebut,
				$DateFin,
				$ListService,
				$service
					);
	} 
	public  function js2PhpTime($jsdate){
		$ret="";
	  if(preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $jsdate, $matches)==1){
		$ret = mktime($matches[4], $matches[5], 0, $matches[1], $matches[2], $matches[3]);
		//echo $matches[4] ."-". $matches[5] ."-". 0  ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
	  }else if(preg_match('@(\d+)/(\d+)/(\d+)@', $jsdate, $matches)==1){
		$ret = mktime(0, 0, 0, $matches[1], $matches[2], $matches[3]);
		//echo 0 ."-". 0 ."-". 0 ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
	  }
	  return $ret;
	}

	public  function php2JsTime($phpDate){
		//echo $phpDate;
		//return "/Date(" . $phpDate*1000 . ")/";
		return date("m/d/Y H:i", $phpDate);
	}

	public  function php2MySqlTime($phpDate){
		return $phpDate ? date("Y-m-d H:i:s", $phpDate) : "";
	}

	public  function mySql2PhpTime($sqlDate){
		$arr = date_parse($sqlDate);
		return count($arr) ? mktime($arr["hour"],$arr["minute"],$arr["second"],$arr["month"],$arr["day"],$arr["year"]) : "";

	}

	public  function zc($c, $i) {
			$d = "666666888888aaaaaabbbbbbdddddda32929cc3333d96666e69999f0c2c2b1365fdd4477e67399eea2bbf5c7d67a367a994499b373b3cca2cce1c7e15229a36633cc8c66d9b399e6d1c2f029527a336699668cb399b3ccc2d1e12952a33366cc668cd999b3e6c2d1f01b887a22aa9959bfb391d5ccbde6e128754e32926265ad8999c9b1c2dfd00d78131096184cb05288cb8cb8e0ba52880066aa008cbf40b3d580d1e6b388880eaaaa11bfbf4dd5d588e6e6b8ab8b00d6ae00e0c240ebd780f3e7b3be6d00ee8800f2a640f7c480fadcb3b1440edd5511e6804deeaa88f5ccb8865a5aa87070be9494d4b8b8e5d4d47057708c6d8ca992a9c6b6c6ddd3dd4e5d6c6274878997a5b1bac3d0d6db5a69867083a894a2beb8c1d4d4dae54a716c5c8d8785aaa5aec6c3cedddb6e6e41898951a7a77dc4c4a8dcdccb8d6f47b08b59c4a883d8c5ace7dcce";
			$start = $c * 30 + $i * 6;
			$i++;
			$end = $c * 30 + $i * 6;
			return "#" . substr($d,$start,$end-$start);
		}
	
	public  function tc($c){
		return Controller::zc($c, 0);
	}
	
	public  function php2JsTimeFR($phpDate){
		//echo $phpDate;
		//return "/Date(" . $phpDate*1000 . ")/";
		return date("d/m/Y H:i", $phpDate);
	}
	
	public  function js2PhpTimeFR($jsdate){
		if(preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $jsdate, $matches)==1){
			$ret = mktime($matches[4], $matches[5], 0, $matches[2], $matches[1], $matches[3]);
			//echo $matches[4] ."-". $matches[5] ."-". 0  ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
		}else if(preg_match('@(\d+)/(\d+)/(\d+)@', $jsdate, $matches)==1){
			$ret = mktime(0, 0, 0, $matches[2], $matches[1], $matches[3]);
			//echo 0 ."-". 0 ."-". 0 ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
		}
		return $ret;
	}
	
	public function debug($variable,$count=false){
		if(is_array($variable)){
			if($count) echo count($variable).'<br/>';
			echo '<pre>';
			print_r($variable);
			echo '</pre>';
		}
		else echo $variable;
		exit();
	}
	public  function pdf($listTask,$DateDebut,$DateFin,$ListService,$service)
	{
		
		$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4-L');
	$mPDF1->SetHeader("Liste des Taches");
	$mPDF1->SetFooter("Exporté le ".date("d/m/Y")."||{PAGENO}/{nb}");
	//$stylesheet = file_get_contents('http://localhost/TMS/css/print.css');
	//$mPDF1->WriteHTML($stylesheet, 1);
	$HTML = '<div class="titre">TABLEAU ILLUSTRATIF DES TRAVAUX EXECUTES PENDANT LA PERIODE DU '.$DateDebut[0].' AU '.$DateFin[0].'</div>';
	
	$ListState = array();
	$States = State::model()->findAll();
	foreach($States as $State)
		$ListState[$State->StateID] = $State->StateName;
	
	$ListActivity = array();
	$Activitys = Activity::model()->findAll();
	foreach($Activitys as $Activity)
		$ListActivity[$Activity->ActivID] = $Activity->ActivName;
	
	
	
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
					<th style="width:100px">SERVICES</th>
					<th style="width:100px">ACTIVITES</th>
					<th style="width:110px">CLIENT</th>
					<th style="width:200px">TRAVAIL FAIT</th>
					<th style="width:70px">TIMING</th>
					<th style="width:70px">ETAT</th>
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
							<td>'.$ListState[$Task->RefStateID].'</td>
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
		$name='/var/www/taches_'.$ListService[$service].'_du_'.date('d-m-Y');
		$mPDF1->Output($name,'F');
		chmod($name, 0777);
	}
}
?>

