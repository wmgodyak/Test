<?php
class ControllerMain extends Controller 
{
  public function __construct()
    {
        $this->model =  new ModelMain();
        $this->view = new View();
    }

    //Default rendering page
   public function actionIndex() {
        $this->view->generate('MainView.php');
    }

    //Logout
    public function actionLogOut() {
        unset($_SESSION['IS_ADMIN']);
        header('location: /');
    }

  //Checkout login
    public  function actionCheckLogin () {
        $result = $this->model->checkLogin();
        if ($result) {
            header('location: /AdminPage');
        }else {
            header('location: /');
        }
    }
    
    //Save post
    public function actionSavePost () {

       $isCaptcha = $this->model->isReCaptcha();

            if ($isCaptcha) {
                $userName = $_POST['name'];
                $userEmail = $_POST['email'];
                $userWebsite = $_POST['website'];
                $userText = $_POST['text'];
                $ip = $this->model->getIp();
                $brouser = $this->model->getBrouser();
                $this->model->save_post($ip , $brouser, $userName, $userEmail, $userWebsite, $userText );
                $json['success'] = true;
                $json['result'] = "Your post was added";
            }else {
                $json['success'] = false;
                $json['result'] = "Confirm that you are not a robot!";
            }
            echo json_encode($json);
    }
}