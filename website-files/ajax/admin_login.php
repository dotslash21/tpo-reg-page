<?php

    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, $var);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        session_start();
        require '../inc/func.php';

        //return array
        $return = [];

        //POST variable
        $token = $_POST['token'];
        $id = $_POST['id'];
        $password = $_POST['password'];

        if(XCSRF::varifycsrf('ad', $token)){
            //If token matched

            //Always return Json format
            header('Content-Type: application/json');  

            //Request for recaptcha
            $re_response = $_POST['g_recaptcha_response'];
            
            if(isset($re_response) && !empty($re_response)){
                $secret = "6LeehWIUAAAAAE83_TmuUYp8VaOY2uc2SXd2aOw9";   //Private key

                //take the response
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$re_response.'&remoteip');
                $respone =  json_decode($verifyResponse); //Decode the json return obj
                
                if($respone->success){      //Checks the  success parameter
                    //If not a robot(varified by captcha)

                    define("_CON_",true);
                    //Connection
                    require("../inc/db-con.php");

                    date_default_timezone_set("Asia/Calcutta");
                    $current_time = date("Y/M/d g:i:s A T P");
                    $current_ip = get_client_ip();

                    //Escaping variables
                    $id_clean = clean($con,$id);
                    $password_clean = clean($con,$password);

                    //Check if admin already exist or not
                    $query_admin = "SELECT id,password FROM admins WHERE id ='".$id_clean."' LIMIT 1";
                    $result_admin =  mysqli_query($con,$query_admin);
                    if(mysqli_num_rows($result_admin) > 0){
                        //Admin exists
                        $admin_details = mysqli_fetch_array($result_admin);
                        $admin_id = $admin_details['id'];
                        $hash = $admin_details['password'];

                        if(password_verify($password_clean,$hash)){
                            //User get signed in
                            $query_add_val= "UPDATE admins SET Last_login_time= '".$current_time."', Last_login_ip = '".$current_ip."' WHERE id = '".$admin_id."' ";
                            if(mysqli_query($con, $query_add_val)){
                                $return['redirect'] = './dashboard.php';
                                $_SESSION['admin_name'] = $admin_id;
                                $_SESSION['admin_id'] = hash('SHA256',' _!@wrwe12vdqsx 31 242 qaz'. $admin_id . 'za131 '.time());
                                setcookie("_t", hash('sha512', $_SERVER['HTTP_USER_AGENT'] . ' asdqwgfgabhg efaoyaffrgerhehe' . $_SESSION['admin_id'] . 'kKJDNFO3J@qwwe135*&^12322'), time() + (30*24*60*60), "/", null, false, true);
                            }
                        }
                        else{
                            //Invalid user email/password
                            $return['error'] = "Invalid User email/password";
                        }
                    }
                    else{
                            $return['error'] = "Admin Id is wrong";
                    }
                    //Make sure the user can be added and is added
                }
                else{
                    $return['error'] = "reCARTCHA doesn't varify you";
                }
            }
            else{
                $return['error'] = "reCAPTCHA varification failed";
            }
        }
        else{
            $return['error'] = "X-CSRF mismatched";
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }
?>