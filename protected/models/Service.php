<?php

/**
 * This is the model class for table "service".
 *
 * The followings are the available columns in table 'service':
 * @property integer $ServID
 * @property string $ServName
 * @property string $ServDescription
 *
 * The followings are the available model relations:
 * @property Task[] $tasks
 */
class Service extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ServName', 'required'),
			array('ServName', 'length', 'max'=>45),
			array('ServDescription', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ServID, ServName, ServDescription', 'safe', 'on'=>'search'),
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
			'tasks' => array(self::HAS_MANY, 'Task', 'RefServiceID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ServID' => 'Service ID',
			'ServName' => 'Service',
			'ServDescription' => 'Description',
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

		$criteria->compare('ServID',$this->ServID);
		$criteria->compare('ServName',$this->ServName,true);
		$criteria->compare('ServDescription',$this->ServDescription,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> array('pageSize'=>Yii::app()->user->getState('pageSize')),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Service the static model class
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
        	'order'=>'ServName ASC'
    	);
    }
}
