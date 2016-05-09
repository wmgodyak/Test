<?php
class Model_Main extends Model {


    public function savePost($ip , $brouser) {

        //writing in db;
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $userWebsite = $_POST['website'];
        $userText = $_POST['text'];
        $userIP = $ip;
        $userBrouser = $brouser;

        $pdo = new Pdo_Object();
        $pdo->query("INSERT INTO users (name , email, website, text, ip,  brouser  )
 VALUES ('".$userName."', '".$userEmail."','".$userWebsite."','".$userText."', '".$userIP."', '".$userBrouser."');");

    }
    
    public function checkLogin() {
        if ($_POST['login']=="login" && $_POST['password'] == "111") {
            if (!isset($_SESSION['IS_ADMIN'])) {
                session_name('IS_ADMIN');
                session_start();
            }
            $_SESSION['IS_ADMIN'] = true;
            return true;
        }else {
            return false;
        }
        
    }


    function  getBrouser () {

        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
        elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
        elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
        elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
        elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
        else $browser = "Неизвестный";
        return $browser;

    }

    function get_ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    
}