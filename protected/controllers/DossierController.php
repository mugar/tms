<?php

class DossierController extends Controller
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
			array('allow', // allow authenticated user to perform actions
				'actions'=>array('admin','delete','create','update','index','view','export'),
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
		$model=new Dossier;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dossier']))
		{
			$model->attributes=$_POST['Dossier'];
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dossier']))
		{
			$model->attributes=$_POST['Dossier'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Dossier');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Dossier('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Dossier']))
			$model->attributes=$_GET['Dossier'];

		$criteria = new CDbCriteria;
		if(Yii::app()->user->getState('__group') == 3){
			$criteria->select = 't.*,tk.UserOwner,tk.AssignedTo,tk.RefDossierID'; 
			$criteria->join = 'LEFT JOIN task tk ON t.DossierID = tk.RefDossierID'; 
			$criteria->condition = 'tk.UserOwner = :UserOwner OR tk.AssignedTo = :AssignedTo';		
			$criteria->params = array(":UserOwner"=>Yii::app()->user->id,":AssignedTo"=>Yii::app()->user->id);
		}
		
		$this->render('admin',array(
			'model'=>$model,
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Dossier the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Dossier::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Dossier $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dossier-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
