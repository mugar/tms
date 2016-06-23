<?php

/**
 * This is the model class for table "taskmaintainer".
 *
 * The followings are the available columns in table 'taskmaintainer':
 * @property integer $TaskMaintainerID
 * @property integer $RefTaskID
 * @property integer $RefMaintainerID
 *
 * The followings are the available model relations:
 * @property Task $refTask
 * @property Maintainer $refMaintainer
 */
class Taskmaintainer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'taskmaintainer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RefTaskID, RefMaintainerID', 'required'),
			array('RefTaskID, RefMaintainerID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TaskMaintainerID, RefTaskID, RefMaintainerID', 'safe', 'on'=>'search'),
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
			'refMaintainer' => array(self::BELONGS_TO, 'Maintainer', 'RefMaintainerID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TaskMaintainerID' => 'Task Maintainer',
			'RefTaskID' => 'Ref Task',
			'RefMaintainerID' => 'Ref Maintainer',
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

		$criteria->compare('TaskMaintainerID',$this->TaskMaintainerID);
		$criteria->compare('RefTaskID',$this->RefTaskID);
		$criteria->compare('RefMaintainerID',$this->RefMaintainerID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Taskmaintainer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
