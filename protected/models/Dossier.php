<?php

/**
 * This is the model class for table "dossier".
 *
 * The followings are the available columns in table 'dossier':
 * @property integer $DossierID
 * @property string $DossierTitle
 * @property string $DossierNote
 * @property integer $RefStateID
 * @property integer $RefClientID
 *
 * The followings are the available model relations:
 * @property State $refState
 * @property Client $refClient
 * @property Task[] $tasks
 */
class Dossier extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dossier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DossierTitle, RefStateID, RefClientID', 'required'),
			array('RefStateID, RefClientID', 'numerical', 'integerOnly'=>true),
			array('DossierTitle', 'length', 'max'=>45),
			array('DossierNote', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('DossierID, DossierTitle, DossierNote, RefStateID, RefClientID', 'safe', 'on'=>'search'),
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
			'refState' => array(self::BELONGS_TO, 'State', 'RefStateID'),
			'refClient' => array(self::BELONGS_TO, 'Client', 'RefClientID'),
			'tasks' => array(self::HAS_MANY, 'Task', 'RefDossierID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'DossierID' => 'Dossier ID',
			'DossierTitle' => 'Titre',
			'DossierNote' => 'Note',
			'RefStateID' => 'Statut',
			'RefClientID' => 'Client',
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
	public function search($criteria = null)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		if(!$criteria) $criteria=new CDbCriteria;

		$criteria->compare('DossierID',$this->DossierID);
		$criteria->compare('DossierTitle',$this->DossierTitle,true);
		$criteria->compare('DossierNote',$this->DossierNote,true);
		$criteria->compare('RefStateID',$this->RefStateID);
		$criteria->compare('RefClientID',$this->RefClientID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> array('pageSize'=>Yii::app()->user->getState('pageSize')),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dossier the static model class
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
        	'order'=>'DossierTitle ASC'
    	);
    }
}
