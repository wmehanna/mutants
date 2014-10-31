<?php
//AVIS : le fichier config.php doit absolument etre dans le dossier analyste!!!

//------ Données reliés à la base de donnée ------

//error_reporting(E_ERROR);
error_reporting(E_ERROR | E_WARNING);
$dbhost = "localhost";
$dbusername="root";
$dbpassword="";
$dbname="lesmutants_db"; 

//Dossier pointant sur le dossier root du siteweb
$usersfolder = "users";
$htmlroot = "/home/lesmutants/public_html/";
$approot=$htmlroot.$usersfolder; 

require("$htmlroot/class/Events.class.php");

require("$htmlroot/class/sql.class.php");
require("$htmlroot/class/sqlcalls.class.php"); 

require("$htmlroot/class/Modules.class.php");
require("$htmlroot/class/Views.class.php");

require("$htmlroot/class/Elements.class.php");
require("$htmlroot/class/Elements/Boolean.class.php");
require("$htmlroot/class/Elements/ParentKey.class.php");
require("$htmlroot/class/Elements/ForeignKey.class.php");
require("$htmlroot/class/Elements/Numeric.class.php");
require("$htmlroot/class/Elements/Query.class.php");
require("$htmlroot/class/Elements/Text.class.php");
require("$htmlroot/class/Elements/Memo.class.php");
require("$htmlroot/class/Elements/Button.class.php");
require("$htmlroot/class/Elements/SectionTitle.class.php");

require("$htmlroot/class/Clients.class.php");
require("$htmlroot/class/Messages.class.php");
require("$htmlroot/class/MessagesModal.class.php");

$query = mysql_num_rows(executerSQL("select * from masters where id_analysts = '".$_SESSION["userid"]."'"));
if($query > 0) $_SESSION["ismaster"] = TRUE;

require_once("events.php");
?>
