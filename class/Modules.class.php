<?php

class Modules extends Events{
    function __construct() {
        parent::__construct();
    }
    
    function getLastIdInsertion(){
        $query = "SHOW TABLE STATUS FROM lesmutants_db LIKE 'tbdetails'";
        return $query["Auto_increment"];
    }
    
    function getLastOrder(){
        return  mysql_num_rows("select * from tbdetails where tbid='".$this->get->tbid."'");
    }
    
    function getClientName(){
        echo mysql_fetch_array(executerSQL("select name from clients where id='{$_SESSION["clientid"]}'"))["name"];
    }
    
    function getModuleName(){
        return mysql_fetch_array(executerSQL("select tbname from tblist where id='{$this->get->tbid}'"))["tbname"];
    }

    function getClientLogo(){
        $logoPath = mysql_fetch_array(executerSQL("select imagepath from clients where id='{$_SESSION["clientid"]}'"))["imagepath"];
        echo("<img src='$logoPath'>");
    }
    
    function listElements(){
        
        $req = ("select tbdetails.* 
            from tbdetails,tblist,clients 
            where tbdetails.tbid = tblist.id 
            and tbdetails.isactive = '1'
            and tblist.client_id = clients.id 
            and tbdetails.tbid = '".$this->get->tbid."'
            order by tbdetails.order
        ");
        
        $req = executerSQL($req);
        
        while($element = mysql_fetch_array($req)){
            $objectType = $element["objecttype"];
            
            (new $objectType())->initAdmin($element);
            
        }
    }
    
    function listModulesAdmin(){
        
        $query = ("select tblist.* from tblist,clients where clients.id = client_id and clients.id = '".$this->get->clientid."'");
        
        $listModules = executerSQL($query);
        
        echo("<div>");
        echo("<ul class='nav_tab'>");
        while($v = mysql_fetch_array($listModules)){
            if($v["id"] == $this->get->tbid) echo("<li class='active'>");
            else echo("<li>");
            echo("<a href=?clientid=".$_GET["clientid"]."&tbid=".$v["id"].">".$v["tbname"]."</a>");
            
            $module = new MessagesModal("","deleteModule_".$v["id"]);
            $module->initDeleteModule($v["id"],$v["tbname"]);
            $module->initUndeleteModule($v["id"],$v["tbname"]);
            echo("</li>");
            
        }
        echo("</ul>");
        echo("<div>");
    }
    
    function listModulesUser(){
        $query = ("
        select tblist.*,views.id as viewid from tblist,clients,views 
        where clients.id = client_id and clients.id = '".$this->get->clientid."' and views.tbid = tblist.id
        group by tblist.id");
        
        $listModules = executerSQL($query);
        
        while($v = mysql_fetch_array($listModules)){
            if($this->get->tbid == $v[id]) echo("<li class='active'>");
            else echo("<li>");
            
            echo("<a href=?clientid=".$_GET["clientid"]."&tbid=".$v["id"]."&viewid=".$v["viewid"].">".$v["tbname"]."</a>");
            
            echo("</li>");
        }
        

    }
    
    function createTable(){
         
        $requete = "SELECT Auto_increment as id FROM information_schema.tables WHERE table_name='tblist'";
        $res = mysql_fetch_array(executerSQL($requete));
        $tableID = $res["id"];

        $requeteCreationTable = "CREATE TABLE tb".$tableID
                ."(id INT(10) unsigned NOT NULL auto_increment, primary key(id),isactive INT(2) unsigned default 1)"
                ."ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
       
       executerSQL($requeteCreationTable);
        
       $requeteInsererTBlist = "INSERT INTO tblist (tbname,client_id) VALUES('{$this->post->moduleName}','{$this->get->clientid}');";
       executerSQL($requeteInsererTBlist);
       
        
    }
    
    function deleteFromDatabaseAdmin(){
        executerSQL("update tblist set isactive = '0' where id = '".$this->get->tbid."'");
    }
    
    function undeleteFromDatabase(){
        executerSQL("update tblist set isactive = '1' where id = '".$this->get->tbid."'");
    }
    
    function save(){
        executerSQL("update tblist set tbname='".$this->post->moduleName."'");
    }
}

?>
