<?php
	class LoginAdmin extends Connection
	{
		function __construct()
		{
			parent::__construct();
		}

        function execute_function($function, $params){
			return $this->db->execute_function($function, $params);
		}
	}

 ?>