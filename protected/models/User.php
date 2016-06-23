<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $UserID
 * @property string $UserName
 * @property string $Login
 * @property string $Password
 * @property string $Email
 * @property integer $Active
 * @property integer $RefGroupID
 *
 * The followings are the available model relations:
 * @property History[] $histories
 * @property Task[] $tasks
 * @property Task[] $tasks1
 * @property Group $refGroup
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserName, Login, RefGroupID', 'required'),
			array('Email', 'email'),
			array('Password','required','on'=>'create'),			
			array('Active, RefGroupID', 'numerical', 'integerOnly'=>true),
			array('UserName, Login, Password, Email', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('UserID, UserName, Login, Password, Email, Active, RefGroupID', 'safe', 'on'=>'search'),
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
			'histories' => array(self::HAS_MANY, 'History', 'RefUserID'),
			'tasks' => array(self::HAS_MANY, 'Task', 'UserOwner'),
			'tasks1' => array(self::HAS_MANY, 'Task', 'AssignedTo'),
			'refGroup' => array(self::BELONGS_TO, 'Group', 'RefGroupID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UserID' => 'Utilisateur ID',
			'UserName' => 'Nom & Prénom',
			'Login' => 'Login',
			'Password' => 'Mot de passe',
			'Email' => 'Email',
			'Active' => 'Active',
			'RefGroupID' => 'Groupe',
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

		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('UserName',$this->UserName,true);
		$criteria->compare('Login',$this->Login,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('RefGroupID',$this->RefGroupID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> array('pageSize'=>Yii::app()->user->getState('pageSize')),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
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
        	'order'=>'UserName ASC'
    	);
    }
}
