<?php
class ModelMain extends Model
{
    //Save post
    public function savePost($userIP, $userBrouser, $userName, $userEmail, $userWebsite, $userText )
    {
        //writing in db;
        $pdo = new Pdo_Object();
        /*$pdo->query("INSERT INTO users (name , email, website, text, ip,  brouser  )
        VALUES ('".$userName."', '".$userEmail."','".$userWebsite."','".$userText."', '".$userIP."', '".$userBrouser."');");*/
        $stmt = $pdo->prepare("INSERT INTO users (name , email, website, text, ip,  brouser ) VALUES ( ?, ?, ?, ?, ?, ? ) ");
        $stmt->execute(array( $userName, $userEmail ,$userWebsite , $userText, $userIP, $userBrouser));
    }

    //Checkout login
    public function checkLogin()
    {
        if ($_POST['login']=="login" && $_POST['password'] == "111") {
            if (!isset($_SESSION['IS_ADMIN'])) {
                session_name('IS_ADMIN');
                session_start();
            }
            $_SESSION['IS_ADMIN'] = true;
            return true;
        } else {
            return false;
        }
    }

    //Get user brouser
    public function  getBrouser () 
    {
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
        elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
        elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
        elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
        elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
        else $browser = "Неизвестный";
        return $browser;
    }

    //Get User IP
    public  function getIp() 
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    //Get reCaptcha result
    public  function isReCaptcha () 
    {
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
                $reCaptcha = true;
            }else {
                $reCaptcha = false;
            }
            return $reCaptcha;
        }
    }
}