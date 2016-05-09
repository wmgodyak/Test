<?php
class Controller_Admin_Page extends Controller {


    function __construct()
    {
        $this->model =  new  Model_Admin_Page();
        $this->view = new View();
    }

    function action_index()
    {
        $pageResult = $this->model->getCountPage();
        $sortedArray = $this->model-> getSortedVal();
        $data = $this->model->get_started_db_data($pageResult,$sortedArray,5);
        $this->view->generate('admin_view.php',$data);
    }

    function action_sorted()
    {
        if ( isset($_POST['value']) && isset($_POST['way']) ) {

            $_SESSION['sortedVal'] = $_POST['value'];
            $_SESSION['sortedWay'] = $_POST['way'];
            $json['success'] = true;
        }else {
            $json['success'] = false;
        }
        
        $json['success'] = true;
        /*$json['value'] = $_SESSION['sortedVal'];
        $json['way'] =  $_SESSION['sortedWay ']*/;
        echo json_encode($json);

    }

    function action_deleteUser()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            $result = $this->model->deleteUser($id);
            $json['success'] = $result;
            echo json_encode($json);
        }
        else {
            $json['success'] = false;
            echo json_encode($json);
        }
    }

    function action_setNumbersOfPage()
    {
        if ( isset($_POST['page'])) {
            $_SESSION['countPage'] = $_POST['page'];
            $data = $_SESSION['countPage'];
        }
        else {
            $data =0;
        }
        $json['success'] = true;
        $json['result'] = $data;
        echo json_encode($json);
    }


    function action_updateUser()
    {
        if ( isset($_POST['text-update'])) {

            $this->model->updateUser($_POST['id'] , $_POST['text-update']);
            $json['success'] = true;
        }
        else {
            $json['success'] = false;
        }
        echo json_encode($json);
    }
}