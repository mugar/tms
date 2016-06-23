<?php

/**
 * This is the model class for table "maintainer".
 *
 * The followings are the available columns in table 'maintainer':
 * @property integer $MaintainerID
 * @property string $MaintName
 * @property string $MaintAdress
 * @property string $MaintPhone
 * @property string $MaintEmail
 *
 * The followings are the available model relations:
 * @property Taskmaintainer[] $taskmaintainers
 */
class Maintainer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'maintainer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MaintName', 'required'),
			array('MaintName, MaintPhone, MaintEmail', 'length', 'max'=>45),
			array('MaintAdress', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('MaintainerID, MaintName, MaintAdress, MaintPhone, MaintEmail', 'safe', 'on'=>'search'),
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
			'taskmaintainers' => array(self::HAS_MANY, 'Taskmaintainer', 'RefMaintainerID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'MaintainerID' => 'Mainteneur ID',
			'MaintName' => 'Mainteneur',
			'MaintAdress' => 'Adresse',
			'MaintPhone' => 'Tél',
			'MaintEmail' => 'Email',
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

		$criteria->compare('MaintainerID',$this->MaintainerID);
		$criteria->compare('MaintName',$this->MaintName,true);
		$criteria->compare('MaintAdress',$this->MaintAdress,true);
		$criteria->compare('MaintPhone',$this->MaintPhone,true);
		$criteria->compare('MaintEmail',$this->MaintEmail,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> array('pageSize'=>Yii::app()->user->getState('pageSize')),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Maintainer the static model class
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
        	'order'=>'MaintName ASC'
    	);
    }
}
