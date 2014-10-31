<?php

    //--------- Fonction qui execute une requete SQL ---------------------
    function executerSQL($requete){
    global $dbhost,$dbusername,$dbpassword,$dbname;

            //Créer une connection mysql
            $connection = new sql($dbhost,$dbusername,$dbpassword,$dbname); //Connection à  la db
            $connection->setQuery($requete);			  	//créeer la requete
            $requete = $connection->runQuery($connection->getQuery());	//executer la requête

            return $requete;
    }
  
?>