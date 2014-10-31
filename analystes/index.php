<?php 
@session_start();
include("config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>INM5151 - Les Mutants</title>
    <link href="../css/analystes.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="../css/analystTable.css" rel="stylesheet" type="text/css" media="screen"/>
</head>

<?php
$_SESSION["analystid"] = 1 ; //Forcer temporairement le ID de wassim en attendant que système de login soit mis en place
$_SESSION["ismaster"] = TRUE;

if($_SESSION["analystid"] != ""){   
?>
    <body>
    <div id="header">
        <h2><a href="?clientid=<?php echo $_GET["clientid"] ?>">INM5151 - LES MUTANTS </a></h2>
        <?php
            $newClient = new MessagesModal("Ajouter ce client","addClient");
            $newClient->initAddClient();            

            $newModule = new MessagesModal("Titre","addModule");
            $newModule->initAddModule();

            if(isset($_GET["clientid"]) && isset($_GET["tbid"]) and !isset($_GET["manage"])){
                $newElement = new MessagesModal("Ajouter un nouvel élément","addElement");
                $newElement->initAddElement();      
            }
            
            if(isset($_GET["clientid"]) && isset($_GET["tbid"])){
                $newView = new MessagesModal("Ajouter une nouvelle vue","addView");
                $newView->initAddView(); 
            }
            
            if(isset($_GET["clientid"]) && isset($_GET["tbid"]) and $_GET["manage"]!="view"){
                echo(" <a href='?clientid=$_GET[clientid]&tbid=".$_GET[tbid]."&manage=view'><img src='icon/kappfinder.png' title='Gérer les vues'></a>");
            }
        ?>
        
    </div>
  
    <div id="container">
        <div class="menuGauche">
            <h1>Clients</h1>
            <ul>
                <?php
                $currentClient = new Clients();
                $currentClient->listClients();
                ?>
            </ul>
        </div>
<?php
   

    

    $clientid = $_GET["clientid"];
    $clientid = mysql_fetch_array(executerSQL("select id from clients where id = '".$clientid."'"));
    
    $tbid = $_GET["tbid"];
    $module = mysql_fetch_array(executerSQL("select * from tblist where id = '".$tbid."'"));
    
    ?>
    <div id="contenu">
    <?php
    (new Modules())->listModulesAdmin(); 
    
    if($clientid["id"] != ""&& $module["id"] != "" && !isset($_GET["manage"])){
    ?>
        <form method="post">
            <div class="pageHeader">  <?php echo($module["tbname"]); ?></div>
            
            <table class="analystTable" border="0">
                <tr>
                    <td></td>
                    <td>Ordre <input type="image" name="saveOrder" src="icon/refresh.png"></td>
                    <td>Nom de l'objet</td>
                    <td>Valeur</td>
                    <td>Édition</td>
                    <td>Suppression</td>
                </tr>                    
                <?php (new Modules())->listElements(); ?>
            </table>
        </form>
            
    <?php
                
    }
    
    if($clientid["id"] != ""&& $module["id"] != "" && $_GET["manage"]=="view"){
        (new Views())->listViewsAdmin();
    }
           
    ?>
        </div>

        </div>
            <div id="footer">  Projet les mutants 2013 </div>
        </body>
        <?php
}else{
    echo("Svp vous logger");
}
?>   
</html>