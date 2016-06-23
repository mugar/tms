<?php

/**
 * This is the model class for table "history".
 *
 * The followings are the available columns in table 'history':
 * @property integer $HistoryID
 * @property string $Action
 * @property string $DateTime
 * @property integer $RefTaskID
 * @property integer $RefUserID
 *
 * The followings are the available model relations:
 * @property Task $refTask
 * @property User $refUser
 */
class History extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Action, RefTaskID, RefUserID', 'required'),
			array('RefTaskID, RefUserID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('HistoryID, Action, DateTime, RefTaskID, RefUserID', 'safe', 'on'=>'search'),
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
			'refTask' => array(self::BELONGS_TO, 'Task', 'RefTaskID'),
			'refUser' => array(self::BELONGS_TO, 'User', 'RefUserID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'HistoryID' => 'History',
			'Action' => 'Note de modification',
			'DateTime' => 'Date Time',
			'RefTaskID' => 'Ref Task',
			'RefUserID' => 'Ref User',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('HistoryID',$this->HistoryID);
		$criteria->compare('Action',$this->Action,true);
		$criteria->compare('DateTime',$this->DateTime,true);
		$criteria->compare('RefTaskID',$this->RefTaskID);
		$criteria->compare('RefUserID',$this->RefUserID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> array('pageSize'=>Yii::app()->user->getState('pageSize')),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return History the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
