<?php 
@session_start();
include("../analystes/config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title>INM5151 - Les Mutants</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./usagerStyle.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="./userFiche.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
<?php
if($_SESSION["clientid"] == $_GET["clientid"] && $_GET["clientid"]>0){
?>
    
<form method="post">
<div id="header">
    <h2><a href="?clientid=<?php echo $_GET["clientid"]; ?>">SYSTÈME - LES MUTANTS</a></h2>
    
   
       <div class="messagebox" id="messageBox"></div>
       <div class="logOff"><a href="?">Fermer la session</a></div>

</div>

<div id="container">
    <div class="menuGauche">
        <h1>Modules</h1>
        <ul>
        <?php (new Modules())->listModulesUser(); ?>
        </ul>
    </div>

    <div class="contenu">
        
        <?php if(!isset($_GET["tbid"])){ ?>
        
        <h1>Bienvenue au système "Les Mutants"</h1>
        <br/>
        <div class="logoClient">
            <?php 
            $clientAttrib = new Modules();
            $clientAttrib->getClientName(); 
            echo("<br/>");
            $clientAttrib->getClientLogo(); 
            ?>
        </div>
        
        
        <?php
        }
        
        if(isset($_GET["tbid"]) && isset($_GET["viewid"])){
        ?>
 
        <ul class="nav_tab">
            <?php
            $vue = new Views();
            $vue->listTabViewsUser();
            ?>
        </ul>
        <div class="userFiche">
            <div class="userViewHeader"><?php (new Elements())->listControlsUserView();  ?></div>
             <table>
                 <?php echo $vue->listViewsColumns($_GET["viewid"]); ?>
                 <?php echo $vue->listViewsRecords($_GET["viewid"]); ?>
             </table>
        </div>
        
        <?php
        }
        if(isset($_GET["tbid"]) && !isset($_GET["viewid"]) && isset($_GET["recordid"])){
            
            (new Elements())->listElementsUser();
        }
        ?>
    </div>

</div>

    
</form>
    <?php
}else{
    ?>
    <form method="post">

    <div id="contenu">
        <h1>Authentification</h1>
        <br/>
        <div class="login">
            <p>Entrez votre nom d'usager et mot de passe</p>
            <br/>
            <img src="../icon/iconUser.png"><input type="text" name="txtusername">
            <br/>
            <img src="../icon/iconPass.png"><input type="text" name="txtpassword"><span>Oublier votre mot de passe?</span>
            <br/>
            <div class="buttonLogin"><input type="submit" name="btnLogin" value="Authentifier"></div>


    </div>
   
    </form>
    <?php
}
    ?>
</body>
</html>