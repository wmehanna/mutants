<?php
class MessagesModal extends Events{
    protected $title;
    protected $className;
    protected $textLink;
            
    function __construct($title, $className) {
        parent::__construct();
        
        $this->title = $title;
        $this->className = $className;
        
        $this->initCss();
        $this->initjQueryCode();
    }


    protected function initCss(){
        ?>
            <style>
                /* Mask for background, by default is not display */
        #mask {
                display: none;
                background: #000; 
                position: fixed; left: 0; top: 0; 
                width: 100%; height: 100%;
                opacity: 0.8;
                z-index: 1000;
        }

        /* You can customize to your needs  */
        .popup{
                display:none;
                background: #333;
                padding: 10px; 	
                border: 2px solid #ddd;
                float: left;
                font-size: 1.2em;
                position: fixed;
                top: 50%; left: 50%;
                color:#FFFFFF; 
                z-index: 9999;
                box-shadow: 0px 0px 20px #999; /* CSS3 */
                -moz-box-shadow: 0px 0px 20px #999; /* Firefox */
                -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
                border-radius:3px 3px 3px 3px;
                -moz-border-radius: 3px; /* Firefox */
                -webkit-border-radius: 3px; /* Safari, Chrome */
                 width:400px;
        }

        img.btn_close { 
                float: right; 
                margin: -20px -20px 0 0;
        }

        fieldset { 
                border:none; 
        }

        form.signin .textbox label { 
                display:block; 
                padding-bottom:7px; 
        }
        
        .label2 { 
            color:#000000; 
        }

        form.signin .textbox { 
                color:#FFFFFF; 
                display:block;
        }

        form.signin p, form.signin span { 
                color:#FFFFFF; 
                font-size:18px; 
                line-height:18px;
                padding: 5px;
        } 

        form.signin .textbox input { 
                background:#EEEEEE; 
                border-bottom:1px solid #333;
                border-left:1px solid #000;
                border-right:1px solid #333;
                border-top:1px solid #000;
                color:#000000; 
                border-radius: 3px 3px 3px 3px;
                -moz-border-radius: 3px;
                -webkit-border-radius: 3px;
                font:12px Arial, Helvetica, sans-serif;
                padding:6px 6px 4px;
        }
        
        

        form.signin input:-moz-placeholder { color:#333333;  }
        form.signin input::-webkit-input-placeholder { color:#333333;  }

        .button { 
                background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
                background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
                background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
                border-color:#000; 
                border-width:1px;
                border-radius:4px 4px 4px 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                color:#333;
                cursor:pointer;
                display:inline-block;
                padding:6px 6px 4px;
                margin-top:10px;
                font:12px; 
                width:214px;
        }
        .button:hover { background:#ddd; }

                    </style>
        
        <?php
    }
    
    protected function initjQueryCode(){
        ?>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>

        <script>
            $(document).ready(function() {
                $('a.popup-window').click(function() {

                        //Getting the variable's value from a link 
                        var popupBox = $(this).attr('href');

                        //Fade in the Popup
                        $(popupBox).fadeIn(300);

                        //Set the center alignment padding + border see css style
                        var popMargTop = ($(popupBox).height() + 24) / 2; 
                        var popMargLeft = ($(popupBox).width() + 24) / 2; 

                        $(popupBox).css({ 
                                'margin-top' : -popMargTop,
                                'margin-left' : -popMargLeft
                        });

                        // Add the mask to body
                        $('body').append('<div id="mask"></div>');
                        $('#mask').fadeIn(300);

                        return false;
                });

                // When clicking on the button close or the mask layer the popup closed
                $('a.close, #mask').live('click', function() { 
                  $('#mask , .popup').fadeOut(300 , function() {
                        $('#mask').remove();  
                }); 
                return false;
                });
        });
        </script>            
        <?php
    }

    

    
    function initDeleteRecord(){
        
        if(isset($this->get->clientid) && isset($this->get->tbid)){
            $this->textLink = "<img src='./icon/cross.png' title='Supprimer la fiche'>";
        }
        ?>
        <div id="<?php echo($this->className); ?>" class="popup">
        <a href="#" class="close"><img src="./icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
            <fieldset class="textbox">
                <span><?php echo($this->title); ?></span>            
                <button class="submit button" name="<?php echo($this->className); ?>" type="submit">Supprimer cette fiche</button>
            </fieldset>
        </div>
        <?php
        $this->showLink();
    }
    
    function initAttributsText($element){
        ?>
        <td>Valeur par défaut </td><td><input name="defvalue" value="<?php echo($element["defvalue"]); ?>" type="text"></td>
        <?php

    }
    
    function initAttributsNumeric($element){
        ?>
        <td>Valeur par défaut </td><td><input name="defvalue" value="<?php echo($element["defvalue"]); ?>" type="text"></td>
        </tr>
        <tr>
        <td>Signe </td><td><input name="sign" value="<?php echo($element["sign"]); ?>" type="text"></td>
        
        <?php

    }
    
    function initAttributsMemo($element){
        ?>
         <td>Valeur par défaut</td> <td><textarea name="defvalue"><?php echo($element["defvalue"]); ?></textarea> </td>
        <?php

    }
    
    function initAttributsQuery($element){
        ?>
         <td>SQL</td>
         <td>select( <textarea name="query" cols="30" rows="10"><?php echo(base64_decode($element["query"])); ?></textarea>
         ) from tb<?php echo($this->get->tbid); ?> where tb<?php echo($this->get->tbid); ?>.id = numéro de la fiche</td>
        <?php

    }
    
    function initAttributsButton($element){
        ?>
         <td>SQL</td> <td><textarea name="query" cols="30" rows="10"><?php echo(base64_decode($element["query"])); ?></textarea> /<td>
        <?php
        
    }
    
    function initAttributsForeignKey($element){
        echo("Liaison avec : <select name='foreignkey'>");
        $list = executerSQL("select * from tblist where client_id='{$this->get->clientid}' and isactive='1'");
        while($v = mysql_fetch_array($list)){
            echo("<option value='$v[id]'");
            if($v["id"] == $element["foreignkey"]) echo(" selected");
            echo(">$v[tbname]</option>");
        }
        echo("</select>");
        echo("<br />");
        
        $list = executerSQL("select * from views where tbid = '".$element["foreignkey"]."'");

            echo("Vue liée (pour les enregistrements) : ");
            echo("<select name='linkedview'>");
            while($v = mysql_fetch_array($list)){
                echo("<option value='$v[id]'");
                if($v["id"] == $element["linkedview"]) echo(" selected");
                echo(">$v[viewname]</option>");
            }
            echo("</select>");
        
    }
    
    function initAttributsParentKey($element){
        
        if(!$element["parentkey"]>0){
            $list = executerSQL("select * from tblist where client_id='{$this->get->clientid}' and tblist.id in (select tbid from tbdetails where foreignkey = '{$this->get->tbid}')");
            echo("Liaison avec : ");
            echo("<select name='parentkey'>");
            while($v = mysql_fetch_array($list)){
                echo("<option value='$v[id]'");
                echo(">$v[tbname]</option>");
            }
            echo("</select>");
        }else{
            $vueExists = mysql_num_rows(executerSQL("select * from views where tbid = '".$element["parentkey"]."'"));
            
            if($vueExists > 0){
                $moduleName = mysql_fetch_array(executerSQL("select tbname from tblist where id = '".$element["parentkey"]."'"));
                echo("<input type='hidden' value='".$element["parentkey"]."' name='parentkey'>");
                echo("Lié au module : <input type='text' value='".$moduleName[tbname]."' readonly='readonly'>");
                echo("<br />");

                $list = executerSQL("select * from views where tbid = '".$element["parentkey"]."'");

                    echo("Vue liée : ");
                    echo("<select name='linkedview'>");
                    while($v = mysql_fetch_array($list)){
                        echo("<option value='$v[id]'");
                        if($v["id"] == $element["linkedview"]) echo(" selected");
                        echo(">$v[viewname]</option>");
                    }
                    echo("</select>");
            }else{
                echo("Il faut créer une vue dans ".$moduleName[tbname]." avant toute modification.");
            }
        }
        echo("<br />");
        
    }
    
    function initAddElement(){
        
        if(isset($this->get->clientid) && isset($this->get->tbid)){
            $this->textLink = "<img src='icon/iconPlus.png' title='Ajouter un élément'>";
        }
        ?>
        <div id="<?php echo($this->className); ?>" class="popup">
        <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
        <form method="post" class="signin" action="#">
            <fieldset class="textbox">
                <div class="analystTable">
                <table>
                    <tr> 
                    <td colspan="2">Nouvel élément</td>
                    </tr> 
                    
                    <tr> 
                <td> Element</td>
                <td> 
                    <select name="elementType">
                        <option value="text">Texte</option>
                        <option value="numeric">Numérique</option>
                        <option value="memo">Memo</option>
                        <option value="button">Button</option>
                        <option value="boolean">CheckBox</option>
                        <option value="query">SQL</option>
                        <option value="parentkey">Vue Parent</option>
                        <option value="foreignkey">Liaison Enfant</option>
                        <option value="sectiontitle">Titre de section</option>
                    </select>
                </td> 
                </tr>
                <tr>
                <td>Nom </td><td><input id="moduleName" name="elementName" value="" type="text" autocomplete="on" placeholder="Nom de l'élément"></td>
                </tr>
                </table>
                </div>
                <button class="submit button" name="<?php echo($this->className); ?>" type="submit">Ajouter</button>
            </fieldset>
        </form>
        </div>
        <?php
        $this->showLink();
    }
    
    function initModalSaveElement($element){ 
        
        if(isset($this->get->clientid) && isset($this->get->tbid)){
            $this->textLink = "<img alt='Sauvegarder Modification' src='./icon/editElement.png'/>";
        }
        ?>
        <div id="<?php echo($this->className); ?>" class="popup">
        <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
        <form method="post" class="signin" action="#">
            <fieldset class="textbox">

                <input name="elementType" value="<?php echo($element[objecttype]); ?>" type="hidden">
                <input name="objectname" value="<?php echo($element[objectname]); ?>" type="hidden">
                <table>
                    <tr>
                    <td colspan="2"><?php echo($element[objectname]); ?></td>
                    </tr>
                    <tr>
                    <td>Nom</td> <td><input name="<?php echo($element[objectname]); ?>" value="<?php echo($element[elementname]); ?>" type="text"></td>
                    </tr>
                    <tr>
                <?php
                    if($element["objecttype"]=="text") $this->initAttributsText($element);
                    if($element["objecttype"]=="numeric") $this->initAttributsNumeric($element);
                    if($element["objecttype"]=="memo") $this->initAttributsMemo($element);
                    if($element["objecttype"]=="query") $this->initAttributsQuery($element);
                    if($element["objecttype"]=="button") $this->initAttributsButton($element);
                    if($element["objecttype"]=="foreignkey") $this->initAttributsForeignKey($element);
                    if($element["objecttype"]=="parentkey") $this->initAttributsParentKey($element);
                 ?>
                   </tr>
                </table>
                <button class="submit button" name="saveElement" type="submit">Enregistrer</button>
            </fieldset>
        </form>
        </div>
        <?php
        $this->showLink();
    }
    
    function initModalDeleteElement($element){
        
        if(isset($this->get->clientid) && isset($this->get->tbid)){
            $this->textLink = "<img src='../icon/iconDel.png' title='Supprimer cet élément'>";
        }
        ?>
        <div id="<?php echo($this->className); ?>" class="popup">
        <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
          <form method="post" class="signin" action="#">

                <fieldset class="textbox">
                <div class="analystTable">
               <table>
                   <tr> 
                   <td><?php echo($this->title); ?></td>
                   </tr> 

               <tr> 
                <input id="clientid" name="elementId" value="<?php echo($element["id"]); ?>" type="hidden">
                <td><?php echo($element["elementname"]." (".$element["objectname"]).")"; ?></td>
                </tr> 
               </table>
                <button class="submit button" name="deleteElement" type="submit">Supprimer Élément</button>
                </fieldset>

          </form>
        </div>
        <?php
        $this->showLink();
    }

    function initDeleteModule($moduleid,$moduleName){
        $requete = "select isactive from tblist where id = ".$moduleid;
        $res =  mysql_fetch_array(executerSQL($requete));
        $isactive = $res["isactive"];
        
        if($isactive){
        
            if(isset($this->get->clientid) && isset($this->get->tbid)){
                $this->textLink = "<img src='../icon/smallx.png' title='Supprimer ce client'>";
            }
            ?>
            <div id="<?php echo($this->className); ?>" class="popup">
            <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
              <form method="post" class="signin" action="#">

            <fieldset class="textbox">
                <div class="analystTable">
               <table>
                   <tr> 
                   <td>Supprimer ce module?</td>
                   </tr> 
                   <tr>
                    <input id="clientid" name="clientid" value="<?php echo($moduleid); ?>" type="hidden">
                    <td><?php echo($moduleName); ?></td>
                    </tr>
                    </table>
                        </div>
                    <button class="submit button" name="deleteModule" type="submit">Supprimer</button>
            </fieldset>

              </form>
            </div>
            <?php
            $this->showLink();
            }
    }
    
    function initUndeleteModule($moduleid,$moduleName){
        $requete = "select isactive from tblist where id = ".$moduleid;
        $res =  mysql_fetch_array(executerSQL($requete));
        $isactive = $res["isactive"];
        
        if(!$isactive){
        
            if(isset($this->get->clientid) && isset($this->get->tbid)){
                $this->textLink = "<img src='icon/arrow_bleu_left_undo_icon.png' title='Désarchiver ce client'>";
            }
            ?>
            <div id="<?php echo($this->className); ?>" class="popup">
            <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
              <form method="post" class="signin" action="#">

                <fieldset class="textbox">
                <div class="analystTable">
                <table>
                   <tr> 
                   <td>Désarchiver ce module?</td>
                   </tr> 
                   <tr>
                    <input id="clientid" name="clientid" value="<?php echo($moduleid); ?>" type="hidden">
                    <td><?php echo($moduleName); ?></td>
                </tr>
                 </table>
                </div>
                    <button class="submit button" name="undeleteModule" type="submit">Désarchiver le Module</button>
                    </fieldset>

              </form>
            </div>
            <?php
            $this->showLink();
            }
    }
    
    function initAddClient(){
        $this->textLink = "<img src='icon/add_application_form_icon.png' title='Ajouter un nouveau client'>";
        ?>
        <div id="<?php echo($this->className); ?>" class="popup">
        <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
          <form method="post" class="signin" action="#">
              
                <fieldset class="textbox">
                <div class="analystTable">
                <table>
                   <tr> 
                   <td><?php echo($this->title); ?></td>
                   </tr> 
                   <tr>
                
                <td><input id="clientName" name="clientName" value="" type="text" autocomplete="on" placeholder="Nom du client"></td>
                </tr>
                </table>
                </div>
                <button class="submit button" name="<?php echo($this->className); ?>" type="submit">Ajouter</button>
                </fieldset>
              
          </form>
        </div>
        <?php
        $this->showLink();
    }
    
    
    function initDeleteClient($clientid,$clientName){
        $requete = "select isactive from clients where id = ".$clientid;
        $res =  mysql_fetch_array(executerSQL($requete));
        $isactive = $res["isactive"];
        
        if($isactive){
            $this->textLink = "<img src='../icon/smallx.png' title='Supprimer ce client'>";
            ?>
            <div id="<?php echo($this->className); ?>" class="popup">
            <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Annuler" alt="Annuler" /></a>
              <form method="post" class="signin" action="#">

                <fieldset class="textbox">
                <div class="analystTable">
                <table>
                   <tr> 
                   <td>Supprimer ce client ?</td>
                   </tr> 
                   <tr>
                
                <input id="clientid" name="clientid" value="<?php echo($clientid); ?>" type="hidden">
                <td><?php echo($clientName); ?></td>
                </tr>
                </table>
                </div>
                <button class="submit button" name="deleteClient" type="submit">Supprimer</button>
                </fieldset>

              </form>
            </div>
            <?php
            
            $this->showLink();
            
        }
    }
    
    function initUndeleteClient($clientid,$clientName){

        $requete = "select isactive from clients where id = ".$clientid;
        $res =  mysql_fetch_array(executerSQL($requete));
        $isactive = $res["isactive"];
        
        if(!$isactive){
             $this->textLink = "<img src='icon/arrow_bleu_left_undo_icon.png' title='Désarchiver'>";
            ?>
            <div id="<?php echo($this->className); ?>" class="popup">
            <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Annuler" alt="Annuler" /></a>
              <form method="post" class="signin" action="#">

                <fieldset class="textbox">
                <div class="analystTable">
                <table>
                   <tr> 
                   <td>Désarchiver ce client ?</td>
                   </tr> 
                   <tr>
                <input id="clientid" name="clientid" value="<?php echo($clientid); ?>" type="hidden">
               <td><?php echo($clientName); ?></td>
                </tr>
                </table>
                </div>
                <button class="submit button" name="undeleteClient" type="submit">Désarchiver ce client</button>
                </fieldset>

              </form>
            </div>
            <?php
       
            $this->showLink(); 
        
        }
    }
    
    function initAddModule(){
        if(isset($this->get->clientid)){
            $this->textLink = "<img src='./icon/add_folder_icon.png' title='Ajouter un module'>";
        }
        ?>
        <div id="<?php echo($this->className); ?>" class="popup">
        <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
          <form method="post" class="signin" action="#">
              
                <fieldset class="textbox">
                <div class="analystTable">
                    <table>
                   <tr> 
                   <td>Nom du module</td>
                   </tr> 
                  
                <td><input id="moduleName" name="moduleName" value="" type="text" autocomplete="on" placeholder="Nom du module"></td>
                </table>
                </div>
                <button class="submit button" name="<?php echo($this->className); ?>" type="submit">Ajouter</button>
                </fieldset>
              
          </form>
        </div>
        <?php
        $this->showLink();
    }
    
    function initManageview($vue){
        ?>
        <link rel="stylesheet" type="text/css" href="../css/jquery.multiselect.css" />
        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
         <?php
          if(isset($this->get->clientid)){
              $this->textLink = "<img src='icon/manageView.png' title='Gérer la vue'>";
          }
          ?>
        <div id="<?php echo($this->className); ?>" class="popup">
        <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
          <form method="post" class="signin" action="#">
              
                <fieldset class="textbox">
                    <div class="analystTable">
                <table>
                   <tr> 
                   <td colspan="2"><?php echo($this->title); ?></td>
                   </tr> 
                   <tr>
                
                <?php 
                   
                    $tabElements = explode(",",$vue["elements"]);
                    
                    $allElement = executerSQL("select * from tbdetails where tbid='".$this->get->tbid."' and isactive='1'");
                ?>
                <input id="viewid" name="viewid" value="<?php echo($vue["id"]); ?>" type="hidden">
                <td>Nom</td><td><input id="viewname" name="viewname" value="<?php echo($vue["viewname"]); ?>" type="text" autocomplete="on" placeholder="Nom de la vue"></td>
                </tr>
                <tr>
                <td>Élément(s)</td><td> <select multiple id="viewElements<?php echo($vue["id"]); ?>" name="viewElements[]">
                    <?php
                    while($element = mysql_fetch_array($allElement)){
                        echo("<option value='$element[objectname]'");
                        foreach($tabElements as $v){
                            if($v == $element[objectname]) echo (" selected='selected'");
                        }
                        echo(">$element[elementname] - $element[objectname]</option>");
                    }
                    ?>
                  </select></td>
                <tr/>
                <tr>
                <td>Filtre</td><td> <textarea name="filter" cols="30" rows="10"><?php echo(base64_decode($vue["filter"])); ?></textarea></td>
                </tr>
                </table>
                    </div>
                <button class="submit button" name="saveView" type="submit">Enregistrer</button>
                </fieldset>
              
          </form>
        </div>
         <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
         <script src="../javascripts/jquery.multiselect.filter.min.js" type="text/javascript"></script>
         <script src="../javascripts/jquery.multiselect.min.js" type="text/javascript"></script>
        
         <script>$(function(){$("#viewElements<?php echo($vue["id"]); ?>").multiselect(); });</script>
        <?php
        $this->showLink();
    } 
    
    function initAddView(){ 
        $this->textLink = "<img src='icon/window_app_list_add.png' title='Ajouter une nouvelle vue'>";
        ?>
        <div id="<?php echo($this->className); ?>" class="popup">
        <a href="#" class="close"><img src="icon/close.png" class="btn_close" title="Fermer" alt="Fermer" /></a>
          <form method="post" class="signin" action="#">
              
                <fieldset class="textbox">
                     <div class="analystTable">
                <table>
                   <tr> 
                   <td colspan="2"><?php echo($this->title); ?></td>
                   </tr> 
                   <tr>
                    <td>Nom </td><td><input id="clientName" name="viewName" value="" type="text" autocomplete="on" placeholder="Nom de la vue"></td>
                   </tr>
                </table>
                    </div>
                <button class="submit button" name="<?php echo($this->className); ?>" type="submit">Ajouter</button>
                </fieldset>
              
          </form>
        </div>
        <?php
        $this->showLink();
    }
    
    function showLink(){
        echo('<a href="#'.$this->className.'" class="popup-window">'.$this->textLink.'</a>');
    }
}

?>
