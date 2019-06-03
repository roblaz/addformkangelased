<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}

	public function user_logined(){
	    return (isset($_SESSION['user']['id']) && isset($_SESSION['user']['login']));
    }

    public function user_is_admin(){
	    return !empty($_SESSION['user']['is_admin']);
    }
    public function user_login($user){
	    if(empty($user)){
	        return false;
        }

        $_SESSION['user'] = $user;
    }
}
