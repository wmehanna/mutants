<?php

class Views extends Events{
    private $elements = array();
            
    function __construct() {
        parent::__construct();
    }
    
    protected function insert(){
        executerSQL("insert into vues (nomVue,tbid) Values('{$this->post->nomModule}','{$this->get->tbid}'");
    }
    
    protected function delete(){
        executerSQL("delete from vues where id = '{$this->get->viewid}'");
    }
    
    protected function save(){
        foreach($this->post->elements as $v){
            array_push($this->elements, $v);
        }
        
        executerSQL("update vues set nomVue='{$this->post->nomVue}', elements='{$this->elements->elementsToString()}");
    }
    
    protected function elementsToString(){
    
        foreach($this->elements as $v){
            $retour.= $v.",";
        }
        
        return $retour;
    }
    
    function listViewsAdmin(){
        
        $req = executerSQL("select * from views where tbid='".$this->get->tbid."'");
        ?>
        <div class="analystTable">
        <table>
        <tr> 
        <td colspan="2">Vues</td>
        </tr> 
        <?Php

        while($v = mysql_fetch_array($req)){
            echo("<tr>");
            echo("<td>$v[viewname]</td>");
            echo("<td>");
            $view = new MessagesModal("Gérer la vue","saveView_".$v[id]);
            $view->initManageview($v);
            echo("</td>");
            echo("</tr>");
        }
        ?>
        </table>
        </div>
        <?Php
    }
    
    function listTabViewsUser(){
        
        $req = executerSQL("select * from views where tbid='".$this->get->tbid."'");
        
        while($v = mysql_fetch_array($req)){
            $tab = "<a href='?clientid={$this->get->clientid}&tbid={$this->get->tbid}&viewid=$v[id]'>$v[viewname]</a>";
            
            if($this->get->viewid == $v[id])echo("<li class='active'>$tab</li>");
            else echo("<li>$tab</li>");
        }

    }
    
    function listViewsColumns($viewid){
        
        $req =  mysql_fetch_array(executerSQL("select * from views where views.id='".$viewid."'"));
        
        foreach(explode(",",$req["elements"]) as $v) {
            $elements.= ",'$v'";
        }
       
        $elements = substr($elements, 1);
        
        $req = executerSQL("select * from tbdetails where objectname in (".$elements. ")");

        
        echo("<tr>");
        echo("<td></td>");
        while($v = mysql_fetch_array($req)){     
            echo("<td>$v[elementname]</td>");
        }
        echo("</tr>");

    }  
    
    function listViewsRecords($viewid){
        
        $cview = "select * from views where id='".$viewid."'";
        
        $cview = mysql_fetch_array(executerSQL($cview));
        
        $nbElements = count(explode(",",$cview["elements"]));
        
        if($nbElements>0) $elements =','.$cview["elements"];
        $tabElements = explode(",","id,".$cview["elements"]);
        
        $fkey = mysql_fetch_array(executerSQL("select objectname from tbdetails where objecttype = 'foreignkey' and tbid ='{$cview["tbid"]}' and foreignkey='{$this->get->tbid}'"));
        
        if(isset($this->get->viewid)) $parentView = "select id $elements from tb".$cview["tbid"]." where isactive='1' and ".base64_decode($cview["filter"]);
        else $parentView = "select id $elements from tb".$cview["tbid"]." where {$fkey["objectname"]}='{$this->get->recordid}' and ".base64_decode($cview["filter"]);
        
        $parentView = executerSQL($parentView);
        
        while($v = mysql_fetch_array($parentView)){
            echo("<tr>");
            echo("<td><a href='?clientid={$this->get->clientid}&tbid=".$cview["tbid"]."&recordid=$v[id]'><img src='./icon/edit.gif'/></td>");
            
            for($i=1;$i<=$nbElements;$i++){
                
                $requete = @mysql_fetch_array(executerSQL("select * from tbdetails where objectname = '$tabElements[$i]'"));
               
                if($requete["objecttype"] == "query"){
                    $requete = base64_decode($requete["query"]);
                    $chaine = "select (".$requete.")as value from tb$cview[tbid] where tb$cview[tbid].id = $v[id]";
                    $req = mysql_fetch_array(executerSQL($chaine));
                }
                
                if(@$requete["objecttype"] == "memo"){
                    $v[$tabElements[$i]] = base64_decode($v[$tabElements[$i]]);
                }
                
                echo("<td>$req[value]  {$v[$tabElements[$i]]}</td>");
                $req[value] = "";
            }
            
            echo("</tr>");
        }
        
    }
    
    function saveToDatabaseAdmin(){

       $tabDetails = array();
       executerSQL("select * from views where tbid = '".$this->get->tbid."' and id='".$this->post->viewid."'");
       
       $elements = @implode(",",$this->post->viewElements);
      
       $req = "update views set 
            viewname='{$this->post->viewname}',
            elements='$elements',
            filter='".base64_encode($this->post->filter)."'
            where tbid='".$this->get->tbid."' and id='".$this->post->viewid."'";
       
       executerSQL($req);
       
    }
    
    function insertToDatabaseAdmin(){

       $req = "insert into views (viewname,visible,tbid)
            VALUES('{$this->post->viewName}',1,{$this->get->tbid})";
       
       executerSQL($req);
       
    }
    
    function getViewName(){
        $viewname = mysql_fetch_array(executerSQL("select * from views where tbid = '".$this->get->tbid."' and id='".$this->get->viewid."'"));
        return $viewname["viewname"];
    }
}

?>
