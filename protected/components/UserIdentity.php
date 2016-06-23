<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
    private $_id;
    public function getId()
    {
        return $this->_id;
    }
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('Login'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->Password!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
		else if(!$record->Active)
			$this->errorCode=100;
        else
        {
            $this->_id=$record->UserID;
            $this->setState('__login', $record->Login);
            $this->setState('__username', $record->UserName);
            $this->setState('__group', $record->refGroup->GroupID);
			
			$this->setState('pageSize',Yii::app()->params['defaultPageSize']);
			
            $this->errorCode=self::ERROR_NONE;
        }
		
		/*$Log = new Log();
		$Log->Login = $this->username;
		$Log->RemoteAddr = $_SERVER["REMOTE_ADDR"];
		$Log->Date = date("Y-m-d H:i:s");
		$Log->Success = $this->errorCode ? "0" : "1";
		$Log->save();*/
		
        return !$this->errorCode;
	}
	 
}