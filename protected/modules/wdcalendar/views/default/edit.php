<?php		
	$wdcalendar_assets = Yii::app()->
		getAssetManager()
			->publish(
				Yii::getPathOfAlias(
					'application.modules.wdcalendar.assets'
				),
				false,
				-1,
				YII_DEBUG
			);
	?>
    <style type="text/css">     
    .calpick     {        
        width:16px;   
        height:20px;     
        border:none;        
        cursor:pointer;        
        background:url("<?php echo $wdcalendar_assets; ?>/css/sample-css/cal.gif") no-repeat center 2px;
        margin-left:-22px;
		vertical-align:bottom;
    }
	.leftCol{
		float:left;
		width:580px;
		margin-right:10px;
	}
	.rightCol{
		float:left;
		padding-left:10px;
		border-left:1px solid #ccc;
	}
	table th{
		text-align:left;
	}
    </style>

<?php
$paramForm = $model->isNewRecord ? array('method' => 'create') : array('method' => 'update', 'id'=>$model->TaskID);
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'fmEdit',
	'action'=>Yii::app()->controller->createUrl( '/wdcalendar/default/datafeed', $paramForm ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	
	
    <div>      
      <div class="toolBotton">           
        <a id="Savebtn" class="imgbtn" href="javascript:void(0);">                
          <span class="Save"  title="Enregistrer">Enregistrer</span>          
        </a>                           
        <?php if(false && !$model->isNewRecord){ ?>
        <a id="Deletebtn" class="imgbtn" href="javascript:void(0);">                    
          <span class="Delete" title="Supprimer">Supprimer</span>                
        </a>             
        <?php } ?>            
        <a id="Closebtn" class="imgbtn" href="javascript:void(0);">                
          <span class="Close" title="Fermer cette fenêtre" >Fermer</span></a>            
        </a>
      </div>                  
      <div style="clear: both">         
      </div>        
      <div class="infocontainer">
        <?php 
		/*
		function js2PhpTime($jsdate){
		  if(preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $jsdate, $matches)==1){
		 //   $ret = mktime($matches[4], $matches[5], 0, $matches[2], $matches[1], $matches[3]);//fr
		   $ret = mktime($matches[4], $matches[5], 0, $matches[1], $matches[2], $matches[3]);//eng
			//echo $matches[4] ."-". $matches[5] ."-". 0  ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
		  }else if(preg_match('@(\d+)/(\d+)/(\d+)@', $jsdate, $matches)==1){
		   // $ret = mktime(0, 0, 0, $matches[2], $matches[1], $matches[3]);//fr
			 $ret = mktime(0, 0, 0, $matches[1], $matches[2], $matches[3]);//en
			//echo 0 ."-". 0 ."-". 0 ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
		  }
		  return $ret;
		}*/
		
		/* <form action="<?php echo Yii::app()->controller->createUrl( '/wdcalendar/default/datafeed', array( 'method' => 'adddetails', 'id' => isset( $event ) ? $event->Id : '' ) ) ?>" class="fform" id="fmEdit" method="post"> */ ?>


		<?php
		if(!empty($model->TaskStart) && !empty($model->TaskEnd)){
			$sarr = explode(" ", $this->php2JsTimeFR($this->mySql2PhpTime($model->TaskStart)));
			$earr = explode(" ", $this->php2JsTimeFR($this->mySql2PhpTime($model->TaskEnd)));
		}elseif(isset($_GET['start'])){
		
			$start = isset($_GET['start'])? $_GET['start'] : null;
			$end = isset($_GET['end'])? $_GET['end'] : null;
			$sarr = explode(" ", $this->php2JsTimeFR($this->js2PhpTime($start)));
			$earr = explode(" ", $this->php2JsTimeFR($this->js2PhpTime($end)));
		} else {
			$sarr[0] = $sarr[1] = null  ;
			$earr[0] = $earr[1] = null  ;
		}
		$timeArray = array();
		for($t=0;$t<1440;$t+=15){
			$time = date("H:i",mktime(0,0,$t*60,1,1,1970));
			$timeArray[$time] = $time;
		}
		
		if($model->isNewRecord)
			$model->AssignedTo = Yii::app()->user->id;
			
		?>                    
		
<table width="100%">
<tr>
	<td style="vertical-align:top">
		<table width="100%">
			<tr>
				<th><?php echo $form->labelEx($model,'TaskTitle'); ?></th>
				<td><?php echo $form->textField($model,'TaskTitle',array('size'=>45,'maxlength'=>45,'class'=>'required')); ?></td>
				<?php /* <td><input MaxLength="200" class="required safe" id="Subject" name="Subject" style="width:85%;" type="text" value="<?php echo isset($event)?$event->Subject:"" ?>" /><input id="colorvalue" name="colorvalue" type="hidden" value="<?php echo isset($event)?$event->Color:"" ?>" /></td> */ ?>
			</tr>
			<tr>
				<th><?php echo $form->labelEx($model,'TaskStart'); ?></th>
				<td>
					<?php echo CHtml::textField("StartDate",isset($sarr)?$sarr[0]:"",array("class"=>"required date","style"=>"padding-left:2px;width:90px;vertical-align:middle")); ?>
					<?php echo CHtml::dropDownList("StartTime",isset($sarr)?$sarr[1]:"",$timeArray,array("class"=>"required","style"=>"width:60px;margin-left:5px;vertical-align:middle")); ?>
					<?php /*  <input MaxLength="10" class="required date" id="stpartdate" name="stpartdate" style="padding-left:2px;width:90px;vertical-align:middle" type="text" value="<?php echo isset($event)?$sarr[0]:""; ?>" />                       
					  <input MaxLength="5" class="required time" id="stparttime" name="stparttime" style="width:40px;margin-left:5px;vertical-align:middle" type="text" value="<?php echo isset($event)?$sarr[1]:""; ?>" />		
					*/ ?>
				</td>
			</tr>
			<tr>
				<th><?php echo $form->labelEx($model,'TaskEnd'); ?></th>
				<td>
					<?php echo CHtml::textField("EndDate",isset($earr)?$earr[0]:"",array("class"=>"required date","style"=>"padding-left:2px;width:90px;vertical-align:middle")); ?>
					<?php echo CHtml::dropDownList("EndTime",isset($earr)?$earr[1]:"",$timeArray,array("class"=>"required","style"=>"width:60px;margin-left:5px;vertical-align:middle")); ?>
				</td>
			</tr>
			<?php /* <tr>
				<td></td>
				<td><input id="IsAllDayEvent" name="IsAllDayEvent" type="checkbox" value="1" <?php if(isset($event)&&$event->IsAllDayEvent!=0) {echo "checked";} ?>/> All Day Event</td>
			</tr>
			*/ ?>
			<tr>
				<th><?php echo $form->labelEx($model,'PercentComplete'); ?></th>
				<td>
					<div id="inputSlider"><?php echo $form->textField($model,'PercentComplete',array('style'=>'width:25px','class'=>'required','readonly'=>true)); ?> %</div>
					<div id="slider"></div>
					<br clear="both"/>
				</td>
			</tr>
			<tr>
				<th><?php echo $form->labelEx($model,'TaskDescription'); ?></th>
				<td><?php echo $form->textArea($model,'TaskDescription',array('rows'=>4, 'cols'=>35)); ?></td>
			</tr>
			<tr>
				<th><?php echo $form->labelEx($model,'RefClientID'); ?></th>
				<td>
					<?php echo $form->dropDownList($model,'RefClientID',CHtml::listData(Client::model()->findAll(),'ClientID','CltName'),array('prompt'=>'','style'=>'width:150px','class'=>'required')); ?>
					<?php echo CHtml::textField('NewClient',"",array('style'=>'display:none;width:148px;height:16px','id'=>'Task_NewClient')); ?>
					<?php echo CHtml::hiddenField('SourceClient',"old"); ?>
					<a href="javascript:void(0)" id="newClient">Nouveau client</a>
					<a href="javascript:void(0)" id="selectClient">Sélectionner un client</a>
				</td>
			</tr>
			<tr>
				<th><?php echo $form->labelEx($model,'RefStateID'); ?></th>
				<td><?php echo $form->dropDownList($model,'RefStateID',CHtml::listData(State::model()->findAll(),'StateID','StateName'),array('prompt'=>'','style'=>'width:150px','class'=>'required')); ?></td>
			</tr>
			<tr>
				<th><?php echo $form->labelEx($model,'RefServiceID'); ?></th>
				<td><?php echo $form->dropDownList($model,'RefServiceID',CHtml::listData(Service::model()->findAll(),'ServID','ServName'),array('prompt'=>'','style'=>'width:150px','class'=>'required')); ?></td>
			</tr>
			<tr>
				<th><?php echo $form->labelEx($model,'RefActivityID'); ?></th>
				<td><?php echo $form->dropDownList($model,'RefActivityID',CHtml::listData(Activity::model()->findAll(),'ActivID','ActivName'),array('prompt'=>'','style'=>'width:150px','class'=>'required')); ?></td>
			</tr>
			<?php //if(Yii::app()->user->getState('__group') != 3){ ?>
			<tr>
				<th><?php echo $form->labelEx($model,'AssignedTo'); ?></th>
				<td><?php echo $form->dropDownList($model,'AssignedTo',CHtml::listData(User::model()->findAll(),'UserID','UserName'),array('prompt'=>'','style'=>'width:150px','class'=>'required')); ?></td>
			</tr>
			<?php //} ?>
			<?php if(!$model->isNewRecord){ ?>
			<tr>
				<th><?php echo $form->labelEx($TaskHistory,'Action'); ?></th>
				<td><?php echo $form->textArea($TaskHistory,'Action',array('rows'=>4, 'cols'=>35,'class'=>'required')); ?></td>
			</tr>
			<?php } ?>
		</table>
	</td>
	<td width="35%" style="vertical-align:top;border-left:1px solid #CCC">
		<table width="100%">
			<?php if($model->File){ ?>
			<tr>
				<td colspan="2">
				<b>Fichier joint</b>: <?php echo '<br><a href="'.Yii::app()->request->hostInfo.Yii::app()->baseUrl.'/files/'.$model->File.'" target="_blank" style="color:blue">'.$model->File.'</a>'; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2">
					<b><?php echo $form->labelEx($model,'RefDossierID'); ?></b><br />
					<?php echo $form->dropDownList($model,'RefDossierID',CHtml::listData(Dossier::model()->findAll(),'DossierID','DossierTitle'),array('prompt'=>'','style'=>'width:150px')); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><b><?php echo $form->labelEx($model,'TravailFait'); ?></b><br /><?php echo $form->textArea($model,'TravailFait',array('rows'=>3, 'cols'=>26)); ?></td>
			</tr>
			<tr>
				<td colspan="2"><b><?php echo $form->labelEx($model,'TravailRestant'); ?></b><br /><?php echo $form->textArea($model,'TravailRestant',array('rows'=>3, 'cols'=>26)); ?></td>
			</tr>
			<tr>
				<th>Maintainers</th>
				<td>
				  <?php
				  $maintainers = Maintainer::model()->findAll();
					foreach($maintainers as $maintainer){
						echo CHtml::checkbox("maintainers[".$maintainer->MaintainerID."]",in_array($maintainer->MaintainerID,$taskMaintainers),array("value"=>$maintainer->MaintainerID));
						echo " ".$maintainer->MaintName."<br />";
					}
				 ?>
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>
		
		
			<?php /*
            <div id="calendarcolor">
            </div>
			*/ ?>
		  

                     
		<input id="timezone" name="timezone" type="hidden" value="" />
        <?php /* </form>          */ ?>
      </div>         
    </div>
		
<?php $this->endWidget(); ?>

	
<?php
$script = 'if (!DateAdd || typeof (DateDiff) != "function") {
            var DateAdd = function(interval, number, idate) {
                number = parseInt(number);
                var date;
                if (typeof (idate) == "string") {
                    date = idate.split(/\D/);
                    eval("var date = new Date(" + date.join(",") + ")");
                }
                if (typeof (idate) == "object") {
                    date = new Date(idate.toString());
                }
                switch (interval) {
                    case "y": date.setFullYear(date.getFullYear() + number); break;
                    case "m": date.setMonth(date.getMonth() + number); break;
                    case "d": date.setDate(date.getDate() + number); break;
                    case "w": date.setDate(date.getDate() + 7 * number); break;
                    case "h": date.setHours(date.getHours() + number); break;
                    case "n": date.setMinutes(date.getMinutes() + number); break;
                    case "s": date.setSeconds(date.getSeconds() + number); break;
                    case "l": date.setMilliseconds(date.getMilliseconds() + number); break;
                }
                return date;
            }
        }
        function getHM(date)
        {
             var hour =date.getHours();
             var minute= date.getMinutes();
             var ret= (hour>9?hour:"0"+hour)+":"+(minute>9?minute:"0"+minute) ;
             return ret;
        }
        $(document).ready(function() {
            //debugger;
            var DATA_FEED_URL = "'.Yii::app()->controller->createUrl( "/wdcalendar/default/datafeed" ).'"
            /*var arrT = [];
            var tt = "{0}:{1}";
            for (var i = 0; i < 24; i++) {
                arrT.push({ text: StrFormat(tt, [i >= 10 ? i : "0" + i, "00"]) }, { text: StrFormat(tt, [i >= 10 ? i : "0" + i, "30"]) });
            }
            $("#timezone").val(new Date().getTimezoneOffset()/60 * -1);
            $("#StartTime").dropdown({
                dropheight: 200,
                dropwidth:60,
                selectedchange: function() { },
                items: arrT
            });
            $("#EndTime").dropdown({
                dropheight: 200,
                dropwidth:60,
                selectedchange: function() { },
                items: arrT
            });*/
            /*var check = $("#IsAllDayEvent").click(function(e) {
                if (this.checked) {
                    $("#StartTime").val("00:00").hide();
                    $("#EndTime").val("00:00").hide();
                }
                else {
                    var d = new Date();
                    var p = 60 - d.getMinutes();
                    if (p > 30) p = p - 30;
                    d = DateAdd("n", p, d);
                    $("#StartTime").val(getHM(d)).show();
                    $("#EndTime").val(getHM(DateAdd("h", 1, d))).show();
                }
            });
            if (check[0].checked) {
                $("#StartTime").val("00:00").hide();
                $("#EndTime").val("00:00").hide();
            }*/
            $("#Savebtn").click(function() { $("#fmEdit").submit();return false; });
            $("#Closebtn").click(function() {  window.parent.$("#gridcontainer").reload(); CloseModelWindow();  });
            $("#Deletebtn").click(function() {
                 if (confirm("Are you sure to remove this task?")) {  
                    var param = [{ "name": "calendarId", value: 8}];                
                    $.post("'.Yii::app()->controller->createUrl( '/wdcalendar/default/datafeed', array("method"=>"remove")).'",
                        param,
                        function(data){
                              if (data.IsSuccess) {
                                    alert(data.Msg); 
                                    CloseModelWindow(null,true);                            
                                }
                                else {
                                    alert("Error occurs.\r\n" + data.Msg);
                                }
                        }
                    ,"json");
                }
            });
            
           $("#StartDate,#EndDate").datepicker({ picker: "<button class=\'calpick\'></button>"});    
            /*var cv =$("#colorvalue").val() ;
            if(cv=="")
            {
                cv="-1";
            }
            $("#calendarcolor").colorselect({ title: "Color", index: cv, hiddenid: "colorvalue" });*/
            //to define parameters of ajaxform
            var options = {
                beforeSubmit: function() {
                    return true;
                },
                dataType: "json",
                success: function(data) {
                    //alert(data.Msg);
                    if (data.IsSuccess) {
						
						window.parent.$("#gridcontainer").reload(); 
						//window.parent.location.reload();
                    }else {
						alert(i18n.xgcalendar.onerror); 
					}
					CloseModelWindow(null,true);
                }
            };
            $.validator.addMethod("date", function(value, element) {                             
                var arrs = value.split(i18n.datepicker.dateformat.separator);
                var year = arrs[i18n.datepicker.dateformat.year_index];
                var month = arrs[i18n.datepicker.dateformat.month_index];
                var day = arrs[i18n.datepicker.dateformat.day_index];
                var standvalue = [year,month,day].join("-");
                return this.optional(element) || /^(?:(?:1[6-9]|[2-9]\d)?\d{2}[\/\-\.](?:0?[1,3-9]|1[0-2])[\/\-\.](?:29|30))(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?: \d{1,3})?)?$|^(?:(?:1[6-9]|[2-9]\d)?\d{2}[\/\-\.](?:0?[1,3,5,7,8]|1[02])[\/\-\.]31)(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?: \d{1,3})?)?$|^(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])[\/\-\.]0?2[\/\-\.]29)(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?: \d{1,3})?)?$|^(?:(?:16|[2468][048]|[3579][26])00[\/\-\.]0?2[\/\-\.]29)(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?: \d{1,3})?)?$|^(?:(?:1[6-9]|[2-9]\d)?\d{2}[\/\-\.](?:0?[1-9]|1[0-2])[\/\-\.](?:0?[1-9]|1\d|2[0-8]))(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?:\d{1,3})?)?$/.test(standvalue);
            }, "Invalid date format");
            $.validator.addMethod("time", function(value, element) {
                return this.optional(element) || /^([0-1]?[0-9]|2[0-3]):([0-5][0-9])$/.test(value);
            }, "Invalid time format");
            $.validator.addMethod("safe", function(value, element) {
                return this.optional(element) || /^[^$\<\>]+$/.test(value);
            }, "$<> not allowed");
			
			/*$.validator.addMethod("atLeastOne", function(value, element, param) {
				return $("input[name^=\"maintainers\"]").is(":checked");
			}, "Please select at least one maintainer");*/
			
            $("#fmEdit").validate({
				rules: { /*';
				
	foreach($maintainers as $maintainer){
		$script .= '
			"maintainers['.$maintainer->MaintainerID.']": "atLeastOne",
		';
	}
		
	$script .= '				

				*/ }, groups: {
					checkboxes: "';
					
	foreach($maintainers as $maintainer) $script .= 'maintainers['.$maintainer->MaintainerID.'] ';
					
	$script .= '"
				},
                submitHandler: function(form) { $("#fmEdit").ajaxSubmit(options); },
                errorElement: "div",
                errorClass: "cusErrorPanel",
                errorPlacement: function(error, element) {
                    showerror(error, element);
                }
            });
            function showerror(error, target) {
                var pos = target.position();
                var height = target.height();
                var newpos = { left: pos.left, top: pos.top + height + 2 }
                var form = $("#fmEdit");             
                error.appendTo(form).css(newpos);
            }
			/*$("#Task_RefStateID option").each(function(){
				if($(this).val()!="")
					$(this).css("background-color",tc($(this).val())[0]);
			});*/
			
        });
		
$(function() {
	$( "#slider" ).slider({
		value:'.($model->isNewRecord ? "10" : $model->PercentComplete).',
		min: 0,
		max: 100,
		step: 10,
		slide: function( event, ui ) {
			$( "#Task_PercentComplete" ).val( ui.value );
		}
	});
	$("#Task_PercentComplete").val( $( "#slider" ).slider( "value" ) );
	$("#Task_RefStateID").change(function(){
		if($(this).val()==3){
			$("#slider").slider("value",100);	
			$( "#Task_PercentComplete" ).val( 100 );
		}			
	});
	$("#newClient").live("click",function(){
		$(this).hide();
		$("#selectClient").show();
		$("#Task_RefClientID").hide();
		$("#Task_NewClient").show();
		$("#SourceClient").val("new");
		$("#Task_RefClientID").toggleClass("required");
		$("#Task_NewClient").toggleClass("required");
	});
	$("#selectClient").live("click",function(){
		$(this).hide();
		$("#newClient").show();
		$("#Task_RefClientID").show();
		$("#Task_NewClient").hide();
		$("#SourceClient").val("old");
		$("#Task_RefClientID").toggleClass("required");
		$("#Task_NewClient").toggleClass("required");
	});
});
		';
    
		Yii::app()->clientScript->registerScript('edit',$script,CClientScript::POS_END);
?>