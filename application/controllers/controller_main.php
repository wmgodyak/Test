<?php
class Controller_Main extends Controller {


  public function __construct()
    {

        $this->model =  new Model_Main();
        $this->view = new View();
    }

    //Default rendering page
   public function action_index() {
        $this->view->generate('main_view.php');
    }

    //Logout
    public function action_log_out() {
        unset($_SESSION['IS_ADMIN']);
        header('location: /');
    }

  //Checkout login
    public  function action_check_login () {
        $result = $this->model->check_login();
        if ($result) {
            header('location: /admin_page');
        }else {
            header('location: /');
        }

    }


    //Save post
    public function action_save_post () {

       $isCaptcha = $this->model->is_reCaptcha();

            if ($isCaptcha) {

                $userName = $_POST['name'];
                $userEmail = $_POST['email'];
                $userWebsite = $_POST['website'];
                $userText = $_POST['text'];
                $ip = $this->model->get_ip();
                $brouser = $this->model->get_brouser();
                
                
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