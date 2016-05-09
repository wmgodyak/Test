<?php
class Controller_Main extends Controller {


    function __construct()
    {

        $this->model =  new Model_Main();
        $this->view = new View();
    }

    function action_index() {
        $this->view->generate('main_view.php');
    }
    
    
    function action_logOut() {
        unset($_SESSION['IS_ADMIN']);
        header('location: /');
    }

    
    function action_checkLogin () {
        $result = $this->model->checkLogin();
        if ($result) {
            header('location: /admin_page');
        }else {
            header('location: /');
        }

    }

    
    function action_savePost () {

        if (isset($_POST["g-recaptcha-response"])){

            //check  reCaptcha
            //$secret = "6LeMWxQTAAAAAJTan8DBLs80b96C2BDzRc2WbGJV";
            $secret = "	6Lc0bR8TAAAAAJ9CJd0axNGq6ldFSMnDHoZoZeg7";

            //empty response
            $response = null;

            // check $secret key
            $reCaptcha = new ReCaptcha($secret);

            //check  reCaptcha
            if ($_POST["g-recaptcha-response"]) {
                $response = $reCaptcha->verifyResponse(
                    $_SERVER["REMOTE_ADDR"],
                    $_POST["g-recaptcha-response"]
                );
            }

            if ($response != null && $response->success) {

                $ip = $this->model->get_ip();
                $brouser = $this->model->getBrouser();
                $this->model->savePost($ip , $brouser);

                $json['success'] = true;
                $json['result'] = "Пост записаний в базу даних!";
            }else {
                $json['success'] = true;
                $json['result'] = "Підтвердіть що ви не робот!";
            }

            echo json_encode($json);
        }
        
    }
    

   
}