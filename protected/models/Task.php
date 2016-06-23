<?php

/**
 * This is the model class for table "task".
 *
 * The followings are the available columns in table 'task':
 * @property integer $TaskID
 * @property string $TaskTitle
 * @property string $TaskDescription
 * @property string $TaskStart
 * @property string $TaskEnd
 * @property integer $PercentComplete
 * @property integer $RefClientID
 * @property integer $RefStateID
 * @property integer $RefServiceID
 * @property integer $RefActivityID
 * @property integer $UserOwner
 * @property integer $AssignedTo
 *
 * The followings are the available model relations:
 * @property History[] $histories
 * @property Client $refClient
 * @property State $refState
 * @property Service $refService
 * @property Activity $refActivity
 * @property User $userOwner
 * @property User $assignedTo
 * @property Taskmaintainer[] $taskmaintainers
 */
class Task extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'task';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TaskTitle, TaskStart, TaskEnd, RefClientID, RefStateID, RefServiceID, RefActivityID, UserOwner, AssignedTo', 'required'),
			array('PercentComplete, RefClientID, RefStateID, RefServiceID, RefActivityID, UserOwner, AssignedTo,RefDossierID', 'numerical', 'integerOnly'=>true),
			array('TaskTitle', 'length', 'max'=>45),
			array('TaskDescription', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TaskID, TaskTitle, TaskDescription, TaskStart, TaskEnd, PercentComplete, RefClientID, RefStateID, RefServiceID, RefActivityID, UserOwner, AssignedTo,RefDossierID', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'histories' => array(self::HAS_MANY, 'History', 'RefTaskID'),
			'refDossier' => array(self::BELONGS_TO, 'Dossier', 'RefDossierID'),
			'refClient' => array(self::BELONGS_TO, 'Client', 'RefClientID'),
			'refState' => array(self::BELONGS_TO, 'State', 'RefStateID'),
			'refService' => array(self::BELONGS_TO, 'Service', 'RefServiceID'),
			'refActivity' => array(self::BELONGS_TO, 'Activity', 'RefActivityID'),
			'userOwner' => array(self::BELONGS_TO, 'User', 'UserOwner'),
			'assignedTo' => array(self::BELONGS_TO, 'User', 'AssignedTo'),
			'taskmaintainers' => array(self::HAS_MANY, 'Taskmaintainer', 'RefTaskID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TaskID' => 'Tâche ID',
			'TaskTitle' => 'Tâche',
			'TaskDescription' => 'Observation',
			'TaskStart' => 'Date Début',
			'TaskEnd' => 'Date Fin',
			'File' => 'Fichier',
			'PercentComplete' => 'Pourcentage',
			'RefClientID' => 'Client',
			'RefStateID' => 'Statut',
			'RefServiceID' => 'Service',
			'RefActivityID' => 'Activité',
			'UserOwner' => 'Utilisateur propriétaire',
			'AssignedTo' => 'Assigné à',
			'RefDossierID' => 'Dossier',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($criteria=null,$pagination=array())
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		if(!$criteria) $criteria=new CDbCriteria;

		$criteria->compare('TaskID',$this->TaskID);
		$criteria->compare('TaskTitle',$this->TaskTitle,true);
		$criteria->compare('TaskDescription',$this->TaskDescription,true);
		
		$TaskStart = !empty($this->TaskStart) ? Controller::php2MySqlTime(Controller::js2PhpTimeFR($this->TaskStart)) : false;
		$TaskEnd = !empty($this->TaskEnd) ? Controller::php2MySqlTime(Controller::js2PhpTimeFR($this->TaskEnd)) : false;
		if($TaskStart) $criteria->compare('TaskStart',">= ".$TaskStart,true);
		if($TaskEnd) $criteria->compare('TaskEnd',"<= ".$TaskEnd,true);
		
		$criteria->compare('PercentComplete',$this->PercentComplete);
		$criteria->compare('TravailFait',$this->TravailFait,true);
		$criteria->compare('TravailRestant',$this->TravailRestant,true);
		$criteria->compare('RefClientID',$this->RefClientID);
		$criteria->compare('RefStateID',$this->RefStateID);
		$criteria->compare('RefServiceID',$this->RefServiceID);
		$criteria->compare('RefActivityID',$this->RefActivityID);
		$criteria->compare('UserOwner',$this->UserOwner);
		$criteria->compare('AssignedTo',$this->AssignedTo);
		$criteria->compare('RefDossierID',$this->RefDossierID);
		
		if (Yii::app() instanceof CWebApplication)
		{
			$pagination=(Yii::app()->user->getState('pageSize')=="all" ||  !is_array($pagination)) ? FALSE : array('pageSize'=>Yii::app()->user->getState('pageSize'));
		}
		else {
			$pagination=false;
		}
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>$pagination,
			'sort'=>array(
       	 		'defaultOrder'=>array(
            		'TaskStart'=>true,
        		),
        	),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Task the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	
	/**
	 * sets for all queries the default sort order.
	 */
	public function defaultScope(){
    	return array(
        	'order'=>'TaskStart ASC',
    	);
    }
}
