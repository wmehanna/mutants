<?php

class Clients extends Events{
    function __construct() {
        parent::__construct();
    }
    
    function insertClientToDb(){
        if($_POST["clientName"] != ""){
            $clientName = $this->post->clientName;

            $query = ("insert into clients (name) VALUES('".$clientName ."')");

            executerSQL($query);
        }
    }
    
    function deleteClientFromDb(){
        $clientid = $this->post->clientid;
        
        $query = ("update clients set isactive='0' where id='".$clientid."'");
        executerSQL($query);
    }
    
    function undeleteClientFromDb(){
        $clientid = $this->post->clientid;
        
        $query = ("update clients set isactive='1' where id='".$clientid."'");
        executerSQL($query);
    }
    
    function listClients(){
        
        if($_SESSION["ismaster"]){
            $query = ("select * from clients");
        }
        else{
            if($_SESSION["analystid"] != ""){
                $query = ("select distinct clients.* from clients,analysts_clients_assoc where clients_id = clients.id and analysts_id='".$_SESSION["analystid"]."' and isactive='1'");
            }            
        }
        
        
        $query = executerSQL($query);
        
        echo("<form method='post'>");
        while($clients = mysql_fetch_array($query)){
            if(!$clients["isactive"]) $isActive="{deleted} ";
            else $isActive="";
            
            if($this->get->clientid == $clients["id"]) echo("<li class='active'>");
            else echo("<li>");
            
            echo("<a href='?clientid=".$clients["id"]."'>".$isActive.$clients["name"]."</a>");
            
            
            $client = new MessagesModal("","deleteClient_".$clients["id"]);
            $client->initDeleteClient($clients["id"],$clients["name"]);
            $client->initUndeleteClient($clients["id"],$clients["name"]);
            
            echo("</li>");
        }
        echo("</form>");
    }
}
?>