<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

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

                    $current_time = date("Y/M/d g:i:s A T P");
                    $current_ip = get_client_ip();

                    //Escaping variables
                    $id_clean = Filter::String(clean($id));
                    $password_clean = Filter::String(clean($password));

                    //Check if admin already exist or not
                    $smt_admin = $pdocon->prepare("SELECT id, password FROM admins WHERE id =:id LIMIT 1");
                    $smt_admin->bindParam(':id', $id_clean, PDO::PARAM_STR);
                    $smt_admin->execute();
                    if($smt_admin->rowCount() > 0){
                        //Admin exists
                        $admin_details  = $smt_admin->fetch(PDO::FETCH_ASSOC);
                        $admin_id       = $admin_details['id'];
                        $hashed         = $admin_details['password'];

                        if(password_verify($password_clean,$hashed)){
                            //User get signed in

                            $smt_add_val = $pdocon->prepare("UPDATE admins SET Last_login_time= :current_time, Last_login_ip = :current_ip WHERE id = :id ");
                            if($smt_add_val->execute(array(':current_time'=>$current_time,':current_ip'=>$current_ip,':id'=>$admin_id))){
                                $return['redirect'] = './dashboard.php';
                                $_SESSION['admin_name'] = $admin_id;
                                $_SESSION['admin_id'] = hash('SHA512',' _!@wrwe12vdqsx 31 242 qaz'. $admin_id . 'za131 '.time());
                                setcookie("_t", hash('sha512', $_SERVER['HTTP_USER_AGENT'] . ' asdqwgfgabhg efaoyaffrgerhehe' . $_SESSION['admin_id'] . 'kKJDNFO3J@qwwe135*&^12322' .time() . '62n663nbsbrbyeby' . get_client_ip()), 0, "/", null, false, true);
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