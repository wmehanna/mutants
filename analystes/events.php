<?php
//print_r($_POST);
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', true);

if(isset($_POST["addClient"])){
    if(strlen($_POST["clientName"]) > 0){
        $clientName = $_POST["clientName"];

        (new Clients())->insertClientToDb();
        new Messages("success","Client {$clientName} ajouté avec succès.");
    }else{
        new Messages("fail","Impossible d'ajouter un client sans nom.");
    }
}

if(isset($_POST["deleteClient"])){
    (new Clients())->deleteClientFromDb();
    new Messages("success","Client { $clientName } supprimé avec succès.");
}

if(isset($_POST["undeleteClient"])){
    (new Clients())->undeleteClientFromDb();
    new Messages("success","Client { $clientName } désarchivé avec succès.");
}

if(isset($_POST["addModule"])){    
    (new Modules())->createTable();
}

if(isset($_POST["deleteModule"])){
    
    (new Modules())->deleteFromDatabaseAdmin();
    
    (new Messages("success","Module ".($_POST["moduleName"])." supprimé avec succès."));
}

if(isset($_POST["undeleteModule"])){
    
    (new Modules())->undeleteFromDatabase();
    
    (new Messages("success","Module ".($_POST["moduleName"])." désarchivé avec succès."));
}

if(isset($_POST["addElement"])){    
    
    $newElement = (new $_POST["elementType"]());
    $newElement->insertToDatabaseAdmin();
    
    (new Messages("success","Élément type ".($_POST["elementName"])." ajouté avec succès."));
}

if(isset($_POST["saveElement"])){
    $newElement = (new $_POST["elementType"]());
    $newElement->saveToDatabaseAdmin();
    
    (new Messages("success","Élément type ".($_POST["elementName"])." sauvegardé avec succès."));
}

if(isset($_POST["saveView"])){
    $view = (new Views());
    $view->saveToDatabaseAdmin();
    
    (new Messages("success","Vue sauvegardée avec succès."));
}
if(isset($_POST["addView"])){
    $view = (new Views());
    $view->insertToDatabaseAdmin();
    
    (new Messages("success","Vue ajoutée avec succès."));
}


if(isset($_POST["deleteElement"])){
    
    (new Elements())->deleteFromDatabaseAdmin();
    
    (new Messages("success","Element ".($_POST["moduleName"])." supprimé avec succès."));
}

//--------------------- usagers ----------------

if(isset($_POST["saveRecord_x"]) || isset($_POST["saveRecord"])){
    (new Elements())->saveToDatabaseUser();
    (new Messages("success","La fiche a été sauvegardée avec succès."));
}

if(isset($_POST["deleteRecord"])){
    (new Elements())->deleteFromDatabaseUser();
    (new Messages("success","La fiche a été supprimée avec succès."));
}

if(isset($_POST["saveOrder_x"]) || isset($_POST["saveOrder"])){
   
    foreach ($_POST as $key => $value) {
        $objet = explode("_", $key);
        
        if($objet[0] == "order")
        executerSQL("update tbdetails set tbdetails.order='$value' where tbid='{$_GET["tbid"]}' and objectname='{$objet[1]}_{$objet[2]}'");
    }
    (new Messages("success","L'ordre des éléments ont étés mis à jour."));
}

/*
 * Gestion des usager "hardcodé" temporairement.  À compléter
 */
if(isset($_POST["btnLogin"])){
   // echo"on authentifie";
    
    //print_r($_POST);
    $username = $_POST["txtusername"];
    $password = $_POST["txtpassword"];
    
    if($username=="client1" && $password=="client1"){      
        $_SESSION["clientid"] = 1;
        ?>
        <meta http-equiv="REFRESH" content="0;url=?clientid=1">
        <?php
    }
    if($username=="client2" && $password=="client2"){
        $_SESSION["clientid"] = 2;
        ?>
        <meta http-equiv="REFRESH" content="0;url=?clientid=2">
        <?php
    }
    if($username=="client3" && $password=="client3"){
        $_SESSION["clientid"] = 3;
        ?>
        <meta http-equiv="REFRESH" content="0;url=?clientid=3">
        <?php
    }
    
}
?>
