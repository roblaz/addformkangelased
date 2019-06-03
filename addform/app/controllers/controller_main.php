<?php

class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
        session_start();
    }

    function action_index()
    {
        
        $data = $this->model->get_data();
        $this->view->generate('/main/main_view.php', 'template_view.php', $data);
        
    }
    
    function action_add(){

        $data = $this->model->add();

        $this->view->generate('/main/add_view.php', 'template_view.php', $data);
       
    }


    function action_remove(){
        global $db;
        $id = $_REQUEST['id'];

        if (!empty($id)) {
            $db->query('DELETE FROM `heroes` WHERE `hero_id` = ?i', $id);
        }
        Route::Location('/');
    }
    
    



}