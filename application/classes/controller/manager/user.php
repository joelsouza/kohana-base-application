<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Manager_User extends Controller_Manager_App {

    public function action_login(){

        $view = new View('manager/user/login');

        if($this->is_logged()){
           $this->request->redirect("manager");
        }

        if($_POST){
            $user = ORM::factory("user", array("username" => trim($_POST["username"]), "password" => md5($_POST["password"])));
            if($user->loaded()){
                $this->session->set("is_authenticated", true);
                $this->session->set("username", $user->name);
                $this->request->redirect("manager");
            }else{
                //TODO: implementar mensagens de erro
            }
        }

        $this->template->content = $view;
    }
    
    public function action_logout(){
        $this->session->destroy();
        $this->request->redirect('manager/user/login');
    }

} // End User
