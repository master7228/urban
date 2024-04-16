<?php
	class Login extends Connection
	{
		function __construct()
		{
			parent::__construct();
		}

        function execute_sp($sp,$attr,$params){
            return $this->db->excecute_sp($sp,$attr,$params);
        }
	}

 ?>