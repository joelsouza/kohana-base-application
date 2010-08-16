<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Manager_App extends Controller_Template {

    public $template = 'layouts/manager';
    public $session;

    function before() {
    	parent::before();
        $this->session = Session::instance();

        if(!$this->is_logged() && ($this->request->controller != "user" && $this->request->action != "login")){
            $this->request->redirect("manager/user/login");
        }
    }

    public function is_logged(){
        return $this->session->get("is_authenticated");
    }
    
} // End Manager App
