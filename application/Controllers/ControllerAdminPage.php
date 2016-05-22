<?php
class ControllerAdminPage extends Controller
{
    public function __construct()
    {
        $this->model = new  ModelAdminPage();
        $this->view = new View();
    }
    
    //Default rendering page
   public function actionIndex()
    {
        $pageResult = $this->model-> getCurrentlyPage();
        $sortedArray = $this->model-> getSortedVal();
        $userQuantity = $this->model-> getUserQuantity();
        $limit = 5 ;
        $data = $this->model->getStartedDbData($pageResult, $sortedArray, $limit, $userQuantity);
        $this->view->generate('AdminView.php',$data);
    }

    //Sorted posts
    public  function actionSorted()
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
    public function actionDelete()
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

    //Page pagination
    public  function actionSetNumbersOfPage()
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
   public function actionUpdate()
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