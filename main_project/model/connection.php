<?php
ini_set("display_errors","1");
/**
* @classname            database
*
* This class contain method and variables which enable connection to the localhost and mysql database..

* @package              Zend_Magic

* @author               Arpit Goyal
* @date                 26-03-2013
* @version              version - 3
* @modified-by          Arpit Goyal
* @modification-date    26-03-2013
* ...
*/

class database
{
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
 



