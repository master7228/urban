<?php 

/**
* 
*/
class Connection extends Controllers
{
	/*private static $HOST = 'localhost';
    private static $USER = 'postgres';
    private static $PASS = 'Master7228';
    public static $DB = $_SESSION["db"];*/
	
	function __construct($db = 'cvs_urban')
	{
		$HOST = "138.197.10.249";//"SERVSQLDLLO1";192.168.1.140
		$USER = "comercio";
		$PASS = "j0rg32022";
		$DB = $db;

		$this->db = new QueryManager($HOST ,$USER ,$PASS,$DB);
	}
}

 ?>