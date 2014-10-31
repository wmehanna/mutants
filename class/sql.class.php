<?php
class sql{

//Variable de classe
var $host; 		//adress IP de la base de donnée
var $username;	//nom d'utilisateur de la bd
var $password;	//mot de passe de la db
var $database;	//nom physique de la db
var $query;		//requete sur la db

//---- Créateur d'objet -----
    function sql($host, $username, $password, $database){
        $this->host=$host;
        $this->username=$username;
        $this->password=$password;
        $this->database=$database;
    }

//---- Destructeur d'objet ----
    function __destruct(){
        mysql_close();
    }

//------ Fonctions getters --------
    function getHost(){return $this->host;}				//retourne l'adress IP de la db
    function getUsername(){return $this->username;}		//retourne le nom d'utilisateur de la db
    function getPassword(){return $this->password;}		//retourne le mot de passe de la db
    function getQuery(){return $this->query;}			//retourne la requete de la db
    function getDatabase(){return $this->database;}		//retourne le nom de la db


//------ Fonction setters ---------
    function setHost($host){$this->host=$host;}					//change l'adress IP de la db
    function setUsername($username){$this->username=$username;}	//change le nom d'utilisateur de la db
    function setPassword($password){$this->username=$password;}	//chanfe le mot de passe de la db
    function setQuery($query){$this->query=$query;}				//change la requete de la db
    function setDatabase($database){$this->database=$database;}	//change le nom de la db

//------ Fonction execute et retourne une reqete --------
    function runQuery($requete){	
        $link = mysql_connect($this->host,$this->username,$this->password) or die();
        mysql_set_charset('utf8',$link);
        mysql_select_db($this->database);
        $query=mysql_query($requete) or die("Erreur SQL : $requete<br/>");;
        return $query;
    }
    

}
?>