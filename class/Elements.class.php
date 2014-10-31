<?php

class Elements extends Events{
    private $name;
    private $objectType;
    private $objectName;
    private $order;
            
    function __construct() {
        parent::__construct();
        
        $this->name = $this->post->elementName;
        $this->objectType = $this->post->elementType;
    }
    
    function insertToDatabaseAdmin(){
       
        $res = "SELECT Auto_increment as id FROM information_schema.tables WHERE table_name='tbdetails'";
        $res = mysql_fetch_array(executerSQL($res));
        $this->objectName = $this->post->elementType."_".$res["id"];
        
        $res = "ALTER TABLE tb".$this->get->tbid." ADD ".$this->objectName." VARCHAR(255)";
        executerSQL($res);
        
        $res = "select tbdetails.order from tbdetails where tbid = {$this->get->tbid} order by tbdetails.order desc limit 0,1";
        $res = mysql_fetch_array(executerSQL($res));
        $this->order = $res["order"]+1;
        
        $res = "insert into tbdetails (elementname, objecttype, objectname, tbdetails.order, tbid) 
         VALUES('{$this->name}','{$this->objectType}','{$this->objectName}','{$this->order}','{$this->get->tbid}')";
         
         executerSQL($res);
    }
    
    function saveToDatabaseAdmin(){
        
       $tabDetails = array();
       $req = executerSQL("select * from tbdetails where tbid = '".$this->get->tbid."' and objectname='".$this->post->objectname."'");
       $v = mysql_fetch_array($req);
       
       
       $req = "update tbdetails set 
            elementname='".$this->post->{$v["objectname"]}."',
            defvalue='".$this->post->defvalue."',
            sign='".$this->post->sign."',
            foreignkey='".$this->post->foreignkey."',
            parentkey='".$this->post->parentkey."',
            linkedview='".$this->post->linkedview."',
            query='".base64_encode($this->post->query)."'
            where tbid='".$this->get->tbid."' and objectname='".$v["objectname"]."'";
       
       executerSQL($req);
    }
    
    function saveToDatabaseUser(){
        $req = executerSQL("select * from  tbdetails where tbid = '{$this->get->tbid}' and objecttype in ('text','numeric','boolean','memo','foreignkey')");
        
        $maj =  "update tb{$this->get->tbid} set ";
        while($v = mysql_fetch_array($req)){
            if($v["objecttype"] == "memo") $maj.= "{$v["objectname"]} = '".base64_encode($this->post->$v["objectname"])."',";
            else $maj.= "{$v["objectname"]} = '{$this->post->$v["objectname"]}',";
        }
        $maj = rtrim($maj,",");
        $maj .= " where tb{$this->get->tbid}.id = '{$this->get->recordid}'";
        
        $recordExists = executerSQL("select * from tb{$this->get->tbid} where tb{$this->get->tbid}.id = {$this->get->recordid}");
        $recordExists = @mysql_num_rows($recordExists);
        if($recordExists>0){
            executerSQL($maj);
        }
        else{
            executerSQL ("insert into tb{$this->get->tbid} (id) VALUES('')");
            executerSQL($maj);
        }
    }
    
    function deleteFromDatabaseAdmin(){
        executerSQL("update tbdetails set isactive = '0' where id = '".$this->post->elementId."'");
    }
    
    function deleteFromDatabaseUser(){
        executerSQL("update tb{$this->get->tbid} set isactive = '0' where tb{$this->get->tbid}.id = '".$this->get->recordid."'");
    }
    
    
    function listViewFromParent($viewid){
        
        echo("<table border='0'>");
        $vue = new Views();
        $vue->listViewsColumns($viewid);
        $vue->listViewsRecords($viewid);
        echo("</table>");
    }
    
    function recordIsActive(){
        if(isset($this->get->tbid) && isset($this->get->recordid)){
            $isActive = mysql_numrows(executerSQL("select * from tb{$this->get->tbid} where isactive ='1' and tb{$this->get->tbid}.id = '{$this->get->recordid}'"));
        }else{
            $isActive = 0;
        }
        return $isActive;
    }
    
    function recordExists(){
        if(isset($this->get->tbid) && isset($this->get->recordid)){
            $exists = mysql_numrows(executerSQL("select * from tb{$this->get->tbid} where tb{$this->get->tbid}.id = '{$this->get->recordid}'"));
        }else{
            $exists = 0;
        }
        return $exists;
    }
    
    function listControlsUserFile(){
        $moduleName = (new Modules())->getModuleName();
        echo("<ul class='controlesFiche'>");
        echo "<span class='nomModule'>".$moduleName."</span>";
  
        if($this->recordIsActive()>0 || $this->recordExists()==0){
            if(isset($this->get->recordid) && isset($this->get->tbid) && isset($this->get->clientid)){
                echo("<li><input type='image' name='saveRecord' src='./icon/Save.png'/></li>");
                $deleteRecord = new MessagesModal("","deleteRecord");
                $deleteRecord->initDeleteRecord();
            }
        }
        echo("</ul>");
    }
    
    function listControlsUserView(){
        $viewName = (new Views())->getViewName();
        echo ("<div class='viewName'>$viewName</div>");
        echo("<ul class='controlesView'>");
        if(!isset($this->get->recordid) && isset($this->get->tbid) && isset($this->get->clientid)){
            $res = "SELECT Auto_increment as id FROM information_schema.tables WHERE table_name='tb{$this->get->tbid}'";
            $res = mysql_fetch_array(executerSQL($res));
            
            echo("<li><a href='?clientid={$this->get->clientid}&tbid={$this->get->tbid}&recordid=$res[id]'><img src='./icon/iconPlus.png'/></a></li>");
        }
            
       
        echo("</ul>");
    }
    
    
    
    function listForeignKey($cdetails,$value){       
        echo("<a href='?clientid={$this->get->clientid}&tbid={$cdetails["foreignkey"]}&recordid={$value}'><img src='./icon/back.png'>  </a>");
        
        $chaine = "select tbid,elements,filter from views where id='{$cdetails["linkedview"]}'";
        
        $tabViews = mysql_fetch_array(executerSQL($chaine));
        $tabElements = explode(",",$tabViews["elements"]);
        
        $chaine = "select id,{$tabViews["elements"]} from tb{$tabViews["tbid"]} where ".base64_decode($tabViews["filter"]);
        $chaine = @executerSQL($chaine);
        
        echo("<select name='$cdetails[objectname]'>");
        if($this->recordIsActive() > 0) $isSelected = " selected";
        else{
            $isSelected = "";
            echo("<option>--------------</option>");
        }
        
        while($v = mysql_fetch_array($chaine)){
            echo("<option value='$v[id]'");
            if($v["id"] == $value) echo("$isSelected");
            echo(">");
            for($i=1;$i<count($v);$i++){
                echo($v[$i]." ");
                $vQuery = mysql_fetch_array(executerSQL("select objecttype,query from tbdetails where objectname = '".$tabElements[$i-1]."'"));
                if($vQuery["objecttype"] == "query"){
                    
                    $this->listQuery($cdetails["foreignkey"],$v[id],$vQuery["query"]);
                }
            }
            echo("</option>");
        }
        echo("</select>");
        echo("<br />");
        
    }
    
    function listQuery($tbid,$recordid,$query){
        $requete = "select(".base64_decode($query).") as value from tb$tbid where tb$tbid.id = $recordid";
        //echo $requete;
        $req = mysql_fetch_array(executerSQL($requete));
        echo $req["value"];
    }
    
    function listElementsUser(){
        $elements = executerSQL("select * from tbdetails where isactive='1' and tbid='{$this->get->tbid}' order by tbdetails.order");
        if($this->recordIsActive()>0 || $this->recordExists()==0){
            ?>
            <div class="userFiche">
            <table>
                <tr>
                    <td colspan="2"><?php (new Elements())->listControlsUserFile();   ?></td>
                </tr>
            <?php
            while($cdetails = mysql_fetch_array($elements)){
                ?>
                
                <tr>
                <?php
                if($cdetails["objecttype"]=="sectiontitle") echo("<td colspan='2'><div class='sectiontitle'>".$cdetails["elementname"]."</div></td>");
                else{
                    echo("<td>".$cdetails["elementname"]."</td>");
                    echo("<td>");
                        $currentElement = mysql_fetch_array(executerSQL("select ".$cdetails["objectname"]." as value from tb{$this->get->tbid} where tb{$this->get->tbid}.id = {$this->get->recordid}"));
                        
                        if($cdetails["objecttype"]=="text") echo("<input type='text' name='".$cdetails["objectname"]."' value='$currentElement[value]'");
                        if($cdetails["objecttype"]=="numeric") echo("<input type='text' name='".$cdetails["objectname"]."' value='$currentElement[value]'>$cdetails[sign]");
                        if($cdetails["objecttype"]=="memo") echo("<textarea name='".$cdetails["objectname"]."'>".base64_decode($currentElement[value])."</textarea>");
                        
                        if($cdetails["objecttype"]=="boolean"){
                            echo("<input type='checkbox' name='".$cdetails["objectname"]."'");
                            if($currentElement[value]=="on") echo(" checked='checked'>"); else echo(">");
                        }
                        if($cdetails["objecttype"]=="parentkey") $this->listViewFromParent($cdetails["linkedview"]);
                        if($cdetails["objecttype"]=="foreignkey") $this->listForeignKey($cdetails,$currentElement[value]);
                        if($cdetails["objecttype"]=="query") $this->listQuery($this->get->tbid,$this->get->recordid,$cdetails["query"]);
                   echo("</td>");
                   
                }
                    ?>
                    
                </tr>
            <?php
            }
            ?>
            </table>      
            </div>
            <?php
        }else{
            if(!isset($_POST["deleteRecord"])){
                (new Messages("fail","Cette fiche ne vous est pas accessible!"));
            }
        }
    }
}

?>
