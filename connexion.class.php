<?php

class ID {
	
	private $login = "antoine";
	private $passwd = "test";
	
	public function Verif($param_login,$param_passwd){

		if (($param_login == $this->login) && ($param_passwd == $this->passwd))
			return 1;
		else
			return 0;
	}
}
?>