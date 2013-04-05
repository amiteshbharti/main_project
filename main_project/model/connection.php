<?php
ini_set("display_errors","1");
class database {
    public $database;
    public $host;
    public $user;
    public $password;
    
function connect()
{
    $this->database =   "online_test";
    $this->host     =   "localhost";
    $this->user     =   "root";
    $this->password =   "root";
	
	$dbh = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
    return $dbh;


}
}

 ?>
 



