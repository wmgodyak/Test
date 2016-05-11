<?php
class Controller_Admin_Page extends Controller {


    public function __construct()
    {
        $this->model =  new  Model_Admin_Page();
        $this->view = new View();
    }
    
    //Default rendering page
   public function action_index()
    {
        $pageResult = $this->model-> get_currently_page();
        $sortedArray = $this->model-> get_sorted_val();
        $userQuantity = $this->model-> get_user_quantity();
        $limit = 5 ;
        $data = $this->model->get_started_db_data($pageResult, $sortedArray, $limit, $userQuantity);
        $this->view->generate('admin_view.php',$data);
    }

    //Sorted posts
    public  function action_sorted()
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

    //Delete user
    public function action_delete()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            $result = $this->model->delete_user($id);
            $json['success'] = $result;
            echo json_encode($json);
        }
        else {
            $json['success'] = false;
            echo json_encode($json);
        }
    }

    //Page pagination
    public  function action_set_numbers_of_page()
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

    //Update user
   public function action_update()
    {
        if ( isset($_POST['text-update'])) {

            $this->model->update_user($_POST['id'] , $_POST['text-update']);
            $json['success'] = true;
        }
        else {
            $json['success'] = false;
        }
        echo json_encode($json);
    }
}