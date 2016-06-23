<?php

class DefaultController extends Controller
{

	public $layout='//layouts/calendar';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('datafeed','edit','index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
        $this->settingsForJs();
		$this->render('index');
	}

    protected function beforeRender( $view )
    {
        if( ! $this->module->embed )
        {
            $this->layout = '/layouts/wdcalendar';
        }

        return parent::beforeRender( $view );
    }

    /**
     * actionDatafeed 
     *
     * this action makes it possible for us to call datafeed as a Yii
     * and it just simply loads the original datafeed.php file
     *
     * @access public
     * @return void
     */
    public function actionDatafeed()
    {
		$this->layout = '/layouts/ajax';
		
		$ret = array();
		
		switch($_GET["method"]){
			case "remove":
				$task = Task::model()->findByPk($_POST["calendarId"]);
				$task->delete();
				$ret['IsSuccess'] = true;
				$ret['Msg'] = 'Succefully';
			break;
			case "create":
				$TaskData = Yii::app()->request->getPost('Task');
				$st = $_POST["StartDate"] . " " . $_POST["StartTime"];
				$et = $_POST["EndDate"] . " " . $_POST["EndTime"];
				//Task
				$task = new Task;
				$task->TaskTitle = $TaskData["TaskTitle"];
				$task->TaskStart = $this->php2MySqlTime($this->js2PhpTimeFR($st));
				$task->TaskEnd = $this->php2MySqlTime($this->js2PhpTimeFR($et));
				$task->TaskDescription = $TaskData["TaskDescription"];
				$task->PercentComplete = $TaskData["PercentComplete"];
				$task->TravailFait = $TaskData["TravailFait"];
				$task->TravailRestant = $TaskData["TravailRestant"];
				if($_POST["SourceClient"] == "old")
					$task->RefClientID = $TaskData["RefClientID"];
				else{
					$Client = new Client;
					$Client->CltName = $_POST["NewClient"];
					$Client->save();
					$task->RefClientID = $Client->ClientID;
				}
				$task->RefStateID = $TaskData["RefStateID"];
				$task->RefServiceID = $TaskData["RefServiceID"];
				$task->RefActivityID = $TaskData["RefActivityID"];
				$task->RefDossierID = $TaskData["RefDossierID"];
				$task->UserOwner = Yii::app()->user->id;
				$task->AssignedTo = (Yii::app()->user->getState('__group') != 3) ? $TaskData["AssignedTo"] : Yii::app()->user->id;
				$task->save();
				//Task History
				$history = new History;
				$history->Action = "Tâche créée";
				$history->RefTaskID = $task->TaskID;
				$history->RefUserID = Yii::app()->user->id;
				$history->save();
				//Maintainers
				if(isset($_POST["maintainers"])){
					foreach($_POST["maintainers"] as $maintainer){
						$TaskMaintainer = new Taskmaintainer;
						$TaskMaintainer->RefTaskID = $task->TaskID;
						$TaskMaintainer->RefMaintainerID = $maintainer;
						$TaskMaintainer->save();
					}
				}
				$ret['IsSuccess'] = true;
				$ret['Msg'] = 'Succefully';
				$ret['Data'] = $task->TaskID;
			break;
			case "quickUpdate":
				$task = Task::model()->findByPk($_POST["id"]);
				$task->TaskStart = $this->php2MySqlTime($this->js2PhpTime($_POST["StartDate"]));
				$task->TaskEnd = $this->php2MySqlTime($this->js2PhpTime($_POST["EndDate"]));
				$task->save();
				//Task History
				$history = new History;
				$history->Action = "Modification de la date";
				$history->RefTaskID = $task->TaskID;
				$history->RefUserID = Yii::app()->user->id;
				$history->save();
				$ret['IsSuccess'] = true;
				$ret['Msg'] = 'Succefully';
			break;
			case "update":
				$TaskData = Yii::app()->request->getPost('Task');
				$st = $_POST["StartDate"] . " " . $_POST["StartTime"];
				$et = $_POST["EndDate"] . " " . $_POST["EndTime"];
				//Task
				$task = Task::model()->findByPk($_GET["id"]);
				$task->TaskTitle = $TaskData["TaskTitle"];
				$task->TaskStart = $this->php2MySqlTime($this->js2PhpTimeFR($st));
				$task->TaskEnd = $this->php2MySqlTime($this->js2PhpTimeFR($et));
				$task->TaskDescription = $TaskData["TaskDescription"];
				$task->PercentComplete = $TaskData["PercentComplete"];
				$task->TravailFait = $TaskData["TravailFait"];
				$task->TravailRestant = $TaskData["TravailRestant"];
				if($_POST["SourceClient"] == "old")
					$task->RefClientID = $TaskData["RefClientID"];
				else{
					$Client = new Client;
					$Client->CltName = $_POST["NewClient"];
					$Client->save();
					$task->RefClientID = $Client->ClientID;
				}
				$task->RefStateID = $TaskData["RefStateID"];
				$task->RefServiceID = $TaskData["RefServiceID"];
				$task->RefActivityID = $TaskData["RefActivityID"];
				$task->RefDossierID = $TaskData["RefDossierID"];
				//$task->UserOwner = Yii::app()->user->id;
				if(Yii::app()->user->getState('__group') != 3) $task->AssignedTo = $TaskData["AssignedTo"];
				$task->save();
				//Task History
				$history = new History;
				$history->Action = $_POST['History']['Action'];
				$history->RefTaskID = $task->TaskID;
				$history->RefUserID = Yii::app()->user->id;
				$history->save();
				//Maintainers
				foreach($task->taskmaintainers as $TaskMaintainer)
					$TaskMaintainer->delete();
				if(isset($_POST["maintainers"])){
					foreach($_POST["maintainers"] as $maintainer){
						$TaskMaintainer = new Taskmaintainer;
						$TaskMaintainer->RefTaskID = $task->TaskID;
						$TaskMaintainer->RefMaintainerID = $maintainer;
						$TaskMaintainer->save();
					}
				}
				$ret['IsSuccess'] = true;
				$ret['Msg'] = 'Succefully';
				$ret['Data'] = $task->TaskID;
			break;
			case "list":
				$day = $_POST["showdate"];
				$type = $_POST["viewtype"];
				$phpTime = $this->js2PhpTime($day);
				//echo $phpTime . "+" . $type;
				switch($type){
					case "month":
						$st = mktime(0, 0, 0, date("m", $phpTime), 1, date("Y", $phpTime));
						$et = mktime(0, 0, -1, date("m", $phpTime)+1, 1, date("Y", $phpTime));
						break;
					case "week":
						//suppose first day of a week is monday 
						$monday  =  date("d", $phpTime) - date('N', $phpTime) + 1;
						//echo date('N', $phpTime);
						$st = mktime(0,0,0,date("m", $phpTime), $monday, date("Y", $phpTime));
						$et = mktime(0,0,-1,date("m", $phpTime), $monday+7, date("Y", $phpTime));
						break;
					case "day":
						$st = mktime(0, 0, 0, date("m", $phpTime), date("d", $phpTime), date("Y", $phpTime));
						$et = mktime(0, 0, -1, date("m", $phpTime), date("d", $phpTime)+1, date("Y", $phpTime));
						break;
				}
				$ret['events'] = array();
				$ret["issort"] =true;
				$ret["start"] = $this->php2JsTime($st);
				$ret["end"] = $this->php2JsTime($et);
				$ret['error'] = null;
				try{
					$criteria = new CDbCriteria;
					$criteria->condition = "(UserOwner = :UserOwner OR AssignedTo = :AssignedTo) AND TaskStart between :st and :et";
					$criteria->params = array(":UserOwner"=>Yii::app()->user->id,":AssignedTo"=>Yii::app()->user->id,":st"=>$this->php2MySqlTime($st),":et"=>$this->php2MySqlTime($et));
					$tasks = Task::model()->findAll($criteria);
					//print_r($tasks);
					foreach($tasks as $task){
						//$ret['events'][] = $row;
						//$attends = $row->AttendeeNames;
						//if($row->OtherAttendee){
						//  $attends .= $row->OtherAttendee;
						//}
						//echo $row->StartTime;
						$ret['events'][] = array(
							$task->TaskID, //num 0
							$task->TaskTitle, //num 1
							$this->php2JsTime($this->mySql2PhpTime($task->TaskStart)), //num 2
							$this->php2JsTime($this->mySql2PhpTime($task->TaskEnd)), //num 3
							0, //all day event //num 4
							0, //more than one day event //num 5
							$task->PercentComplete,//PercentComplete //num 6
							$task->refState->StateColor,//color => state //num 7
							1,//($task->UserOwner==Yii::app()->user->id) ? 1 : 0,//editable //num 8
							$task->refClient->CltName,//num 9
							$task->refService->ServName,//num 10
							$task->refActivity->ActivName,//num 11
							($task->AssignedTo==Yii::app()->user->id) ? "" : $task->assignedTo->UserName,//num 12
							$task->refState->StateName,//num 13
						);
					}
				}catch(Exception $e){
					$ret['error'] = $e->getMessage();
				}

			break;
		}

		//require_once( YiiBase::getPathOfAlias( 'application.modules.wdcalendar.components') . '/datafeed.php' );
		echo json_encode($ret);
		die();	//Yii::app()->end();
		
    }

    /**
     * actionEdit  
     * 
     * this action makes it possible for us to call edit as a Yii action
     * and it just simply loads the original edit.php file
     *
     * @access public
     * @return void
     */
    public function actionEdit()
    {
		$this->layout='//layouts/editLayout';
		$this->settingsForJs();
		//$wdcalendar_assets = $this->module->getAssetsUrl();
		
		$model = (isset($_GET['id']) && !empty($_GET['id'])) ? Task::model()->findByPk($_GET['id']) : new Task;
		$taskMaintainers = CHtml::listData($model->taskmaintainers,"TaskMaintainerID","RefMaintainerID");
		
		$this->render('edit',array(
			'model'=>$model,
			'TaskHistory'=>new History,
			'taskMaintainers'=>$taskMaintainers,
		));
		
        //require_once( YiiBase::getPathOfAlias( 'application.modules.wdcalendar.components') . '/edit.php' );
        //die();
    }

    /**
     * settingsForJs 
     * 
     * @access public
     * @return void
     */
    public function settingsForJs()
    {
        $wdcalendar_assets = $this->module->getAssetsUrl();

        $cs=Yii::app()->clientScript;
        $cs->registerScript( 'absolute_datafeed_url', 'var absolute_datafeed_url="' . Yii::app()->controller->createAbsoluteUrl( '/wdcalendar/default/datafeed' ) . '";', CClientScript::POS_HEAD );
        $cs->registerScript( 'absolute_edit_url', 'var absolute_edit_url="' . Yii::app()->controller->createUrl( '/wdcalendar/default/edit' ) . '";', CClientScript::POS_HEAD );
        $cs->registerScript( 'absolute_default_url', 'var absolute_default_url="' . Yii::app()->controller->createUrl( '/wdcalendar/default/' ) . '";', CClientScript::POS_HEAD );
        $cs->registerScript( 'wd_url_separator', "var wd_url_separator='" . ( Yii::app()->urlManager->urlFormat == 'get' ? '&' : '?' ) ."';", CClientScript::POS_HEAD );

        // and finally let's load the calendar options
        $wd_options_out = '{';
            foreach( $this->module->getWdOptions() as $option => $val )
            {
                // JS: means we are passing a JS variable/function/callback etc
                if( preg_match( '/^JS:/', $val ) )
                {
                    $wd_options_out .= $option . ':' . str_replace( 'JS:', '', $val )  . ',';
                }
                else
                {
                    $wd_options_out .= "$option:\"$val\",";
                }
            }
        $wd_options_out = preg_replace( '/,$/','}', $wd_options_out );
        $cs->registerScript( 'wd_options', 'var wd_options=' . $wd_options_out . ';', CClientScript::POS_HEAD );

    }
}
