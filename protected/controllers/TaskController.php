<?php

class TaskController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
		 array('allow',  // allow all users to perform 'list' and 'show' actions
            'actions'=>array('export','email'),
            'users'=>array('*'),
        ),
			array('allow', // allow authenticated user to perform actions
				'actions'=>array('admin','delete','create','update','index','view'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			)
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Task;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Task']))
		{
			$model->attributes=$_POST['Task'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$task = $this->loadModel($id);
		
		if(Yii::app()->user->getState('__group') == 3 && $task->UserOwner!=Yii::app()->user->id && $task->AssignedTo != Yii::app()->user->id)
			throw new CHttpException(403,
				Yii::t('app', 'Vous n\'êtes pas autorisé a effectuer cette opération.'));
		
		$history = new History;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Task']))
		{
				$TaskData = Yii::app()->request->getPost('Task');
				//Task
				$task->TaskTitle = $TaskData["TaskTitle"];
				$task->TaskStart = $this->php2MySqlTime($this->js2PhpTimeFR($TaskData["TaskStart"]));
				$task->TaskEnd = $this->php2MySqlTime($this->js2PhpTimeFR($TaskData["TaskEnd"]));
				$task->TaskDescription = $TaskData["TaskDescription"];
				$task->PercentComplete = $TaskData["PercentComplete"];
				$task->TravailFait = $TaskData["TravailFait"];
				$task->TravailRestant = $TaskData["TravailRestant"];
				
				$ClientValidation = true;
				if($_POST["SourceClient"] == "old")
					$task->RefClientID = $TaskData["RefClientID"];
				else{
					$Client = new Client;
					if(empty($_POST["NewClient"])){
						$task->RefClientID = NULL;
					}else{
						$Client->CltName = $_POST["NewClient"];
						$Client->save();
						$task->RefClientID = $Client->ClientID;
					}
				}
				
				$task->RefStateID = $TaskData["RefStateID"];
				$task->RefServiceID = $TaskData["RefServiceID"];
				$task->RefActivityID = $TaskData["RefActivityID"];
				$task->RefDossierID = $TaskData["RefDossierID"];
				//$task->UserOwner = Yii::app()->user->id;
				$task->AssignedTo = $TaskData["AssignedTo"];
				
				$history->Action = $_POST['History']['Action'];
				$history->RefTaskID = $task->TaskID;
				$history->RefUserID = Yii::app()->user->id;
				
				$TaskValidation = $task->validate();
				$HistoryValidation = $history->validate();

				if($TaskValidation && $HistoryValidation && $ClientValidation){
					//file
					$oldFile = $task->File;
					$task->File = $TaskData["File"];
					$task->File = $oldFile;
					$uploadedFile=CUploadedFile::getInstance($task,'File');
					if(!empty($uploadedFile)){
						$extension = strtolower($uploadedFile->extensionName);
						if(in_array($extension,Yii::app()->params['fileExtensions'])){
							$rnd = uniqid();  // generate random number between 0-9999
							$fileName = "{$rnd}.{$extension}";  // random number + file name
							$task->File = $fileName;
						}	
					}
					if($task->save()){
						if(isset($fileName)) {
							$uploadedFile->saveAs(Yii::app()->basePath.'/../files/'.$fileName);
							if($oldFile && file_exists(Yii::app()->basePath.'/../files/'.$oldFile)) unlink(Yii::app()->basePath.'/../files/'.$oldFile);
						}
					}
					$history->save();
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
					$this->redirect(array('admin'));
				}
		}
		
		$this->render('update',array(
			'model'=>$task,
			'history'=>$history,
			//'taskMaintainers'=>$taskMaintainers,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Task');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Task('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Task']))
			$model->attributes=$_GET['Task'];
			
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Task the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Task::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Task $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='task-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionEmail()
  {   
      //use 'contact' view from views/mail
				$mail = new YiiMailer('email', array('message' => 'Body', 'name' => 'armand',
																					 'description' => 'Voici les rapports des taches en pièces jointes'
																));
				
				//set properties
				$mail->setFrom('mugabo@mugabo.com', 'felix');
				$mail->setSubject('Rapport des taches du '.date('d-m-Y'));
				$mail->setTo('mugarmug@gmail.com');
				$mail->setAttachment('/var/www/rapports_des_taches.zip');
				//send
				
				if ($mail->send()) {
					exit('Succeeded !');
				} else {
					exit('failed!');
				}
  }
	public function actionExport($mode='D',$service=null){
	
		//$this->layout = 'ajax';

		$model=new Task('search');
				
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Task']))
			$model->attributes=$_GET['Task'];
		
		$pagination = false;
		$criteria=new CDbCriteria;
		if($mode=='D'){
			if(Yii::app()->user->getState('__group') == 3){
				$criteria->condition = "(UserOwner = :UserOwner OR AssignedTo = :AssignedTo)";
				$criteria->params = array(":UserOwner"=>Yii::app()->user->id,":AssignedTo"=>Yii::app()->user->id);
			}
		}
		else {
			$criteria->condition = "(RefServiceID = :RefServiceID AND DATE(TaskEnd) = :TaskEnd)";
			$criteria->params = array(":RefServiceID"=>$service,":TaskEnd"=>date("Y-m-d"));
		}
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
		$name=($mode=='D')?'Liste_des_taches.pdf':'/var/www/taches_'.$ListService[$service].'_du_'.date('d-m-Y');
	//	exit('exit');
		$this->render('export',array(
			'type'=>$_GET['type'],
			'listTask'=>$listTask,
			'DateDebut'=>$DateDebut,
			'DateFin'=>$DateFin,
			'mode'=>$mode,
			'name'=>$name,
			'ListService'=>$ListService
		));
		
	}
	
}
