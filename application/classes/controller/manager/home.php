<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Manager_Home extends Controller_Manager_App {

    public function action_index(){
        $view = new View('manager/home/index');
        $this->template->content = $view;
    }

} // End Home
