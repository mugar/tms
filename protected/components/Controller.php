<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public function accessRules()
	{
		$rules = array();
		if(Yii::app()->user->getState('__group') == 1)
			$rules[] = array('allow', // allow authenticated user to perform actions
				'actions'=>array('admin','delete','create','update','index','view'),
				'users'=>array('@'),
			);
		$rules[] = array('deny',  // deny all users
			'users'=>array('*'),
		);
		
		return $rules;
	}
	protected function beforeAction($action)
	{
		// MAJ du Page Size
		if (isset($_GET['pageSize'])) {
		    Yii::app()->user->setState('pageSize',$_GET['pageSize']);
		    unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		return true;
	}	
	public static function js2PhpTime($jsdate){
		$ret="";
	  if(preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $jsdate, $matches)==1){
		$ret = mktime($matches[4], $matches[5], 0, $matches[1], $matches[2], $matches[3]);
		//echo $matches[4] ."-". $matches[5] ."-". 0  ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
	  }else if(preg_match('@(\d+)/(\d+)/(\d+)@', $jsdate, $matches)==1){
		$ret = mktime(0, 0, 0, $matches[1], $matches[2], $matches[3]);
		//echo 0 ."-". 0 ."-". 0 ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
	  }
	  return $ret;
	}

	public static function php2JsTime($phpDate){
		//echo $phpDate;
		//return "/Date(" . $phpDate*1000 . ")/";
		return date("m/d/Y H:i", $phpDate);
	}

	public static function php2MySqlTime($phpDate){
		return $phpDate ? date("Y-m-d H:i:s", $phpDate) : "";
	}

	public static function mySql2PhpTime($sqlDate){
		$arr = date_parse($sqlDate);
		return count($arr) ? mktime($arr["hour"],$arr["minute"],$arr["second"],$arr["month"],$arr["day"],$arr["year"]) : "";

	}

	public static function zc($c, $i) {
			$d = "666666888888aaaaaabbbbbbdddddda32929cc3333d96666e69999f0c2c2b1365fdd4477e67399eea2bbf5c7d67a367a994499b373b3cca2cce1c7e15229a36633cc8c66d9b399e6d1c2f029527a336699668cb399b3ccc2d1e12952a33366cc668cd999b3e6c2d1f01b887a22aa9959bfb391d5ccbde6e128754e32926265ad8999c9b1c2dfd00d78131096184cb05288cb8cb8e0ba52880066aa008cbf40b3d580d1e6b388880eaaaa11bfbf4dd5d588e6e6b8ab8b00d6ae00e0c240ebd780f3e7b3be6d00ee8800f2a640f7c480fadcb3b1440edd5511e6804deeaa88f5ccb8865a5aa87070be9494d4b8b8e5d4d47057708c6d8ca992a9c6b6c6ddd3dd4e5d6c6274878997a5b1bac3d0d6db5a69867083a894a2beb8c1d4d4dae54a716c5c8d8785aaa5aec6c3cedddb6e6e41898951a7a77dc4c4a8dcdccb8d6f47b08b59c4a883d8c5ace7dcce";
			$start = $c * 30 + $i * 6;
			$i++;
			$end = $c * 30 + $i * 6;
			return "#" . substr($d,$start,$end-$start);
		}
	
	public static function tc($c){
		return Controller::zc($c, 0);
	}
	
	public static function php2JsTimeFR($phpDate){
		//echo $phpDate;
		//return "/Date(" . $phpDate*1000 . ")/";
		return date("d/m/Y H:i", $phpDate);
	}
	
	public static function js2PhpTimeFR($jsdate){
		if(preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $jsdate, $matches)==1){
			$ret = mktime($matches[4], $matches[5], 0, $matches[2], $matches[1], $matches[3]);
			//echo $matches[4] ."-". $matches[5] ."-". 0  ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
		}else if(preg_match('@(\d+)/(\d+)/(\d+)@', $jsdate, $matches)==1){
			$ret = mktime(0, 0, 0, $matches[2], $matches[1], $matches[3]);
			//echo 0 ."-". 0 ."-". 0 ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
		}
		return $ret;
	}
	
	public static function debug($variable,$count=false){
		if(is_array($variable)){
			if($count) echo count($variable).'<br/>';
			echo '<pre>';
			print_r($variable);
			echo '</pre>';
		}
		else echo $variable;
		exit();
	}
}