<body>
    <div>

      <div id="calhead" style="padding:1px;">  
	              
            <div id="caltoolbar" class="ctoolbar">
              <div id="faddbtn" class="fbutton">
                <?php if( ! array_key_exists( 'readonly', $this->module->wd_options ) || $this->module->wd_options[ 'readonly' ] != 'JS:true' ) : // TODO make this prettier ?>
                    <div>
                        <span title='Cliquer pour ajouter une tâche' class="addcal">
                            Nouvelle Tâche                
                        </span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="btnseparator"></div>
             <div id="showtodaybtn" class="fbutton">
                <div><span title='Cliquer pour afficher la semaine encours' class="showtoday">
                Aujourd'hui</span></div>
            </div>
              <div class="btnseparator"></div>

            <div id="showdaybtn" class="fbutton">
                <div><span title='Jour' class="showdayview">Jour</span></div>
            </div>
              <div  id="showweekbtn" class="fbutton fcurrent">
                <div><span title='Semaine' class="showweekview">Semaine</span></div>
            </div>
              <div  id="showmonthbtn" class="fbutton">
                <div><span title='Mois' class="showmonthview">Mois</span></div>
            </div>
            <div class="btnseparator"></div>
              <div  id="showreflashbtn" class="fbutton">
                <div><span title='Refresh view' class="showdayflash">Actualiser</span></div>
                </div>
             <div class="btnseparator"></div>
            <div id="sfprevbtn" title="Préc."  class="fbutton">
              <span class="fprev"></span>

            </div>
            <div id="sfnextbtn" title="Suiv." class="fbutton">
                <span class="fnext"></span>
            </div>
            <div class="fshowdatep fbutton">
                    <div>
                        <input type="hidden" name="txtshow" id="hdtxtshow" />
                        <span id="txtdatetimeshow">Sélectionner une date</span>

                    </div>
            </div>
            
            <div class="clear"></div>
            </div>
      </div>
      <div style="padding:0 1px;">

        <div class="t1 chromeColor">
            &nbsp;</div>
        <div class="t2 chromeColor">
            &nbsp;</div>
        <div id="dvCalMain" class="calmain printborder">
            <div id="gridcontainer" style="overflow-y: visible;">
            </div>
        </div>
        <div class="t2 chromeColor">

            &nbsp;</div>
        <div class="t1 chromeColor">
            &nbsp;
        </div>   
        </div>
  </div>
