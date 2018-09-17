<?php
    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, htmlspecialchars($var,ENT_QUOTES));
    }

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

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        session_start();

        require '../inc/func.php';

        //return Variable
        $return = [];

        //POST variables
        $dataObj = $_POST['dataObj'];
        $degree_name = $_POST['degreeName'];
        $course_name = $_POST['courseName'];
        $course_value= $_POST['courseValue'];

        if(XCSRF::varifycsrf('1d',$dataObj['token'])){
            //If token matched

            //Request for recaptcha
            $re_response = $dataObj['g_recaptcha_response'];
            
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

                    $browser = $_SERVER['REMOTE_ADDR'];
                    $inst_ip = get_client_ip();

                    //Always return Json format
                    header('Content-Type: application/json');

                    //Credentials
                    //Basic Details
                    $name       = $dataObj['name'];
                    $inst_code  = $dataObj['inst_code'];
                    $uid        = $dataObj['uid'];
                    $password   = $dataObj['password'];
                    $estd       = $dataObj['estd'];
                    $accrd      = $dataObj['accrd'];
                    $inst_type  = $dataObj['inst_type'];
                    $affli      = $dataObj['affli'];
                    $inst_appr  = $dataObj['inst_appr'];
                    $address    = trim($dataObj['address']);
                    $pin        = $dataObj['pin'];
                    $inst_state = $dataObj['inst_state'];
                    $ins_dst    = $dataObj['ins_dst'];
                    $number     = $dataObj['number'];
                    $email      = $dataObj['email'];
                    $website    = $dataObj['website'];

                    //Head Details
                    $head_name  = $dataObj['head_name'];
                    $head_desg  = $dataObj['head_desg'];
                    $head_mob   = $dataObj['head_mob'];
                    $head_ph    = $dataObj['head_ph'];
                    $head_email = $dataObj['head_email'];

                    //Tpo Details
                    $tpo_name   = $dataObj['tpo_name'];
                    $tpo_contact1 = $dataObj['tpo_contact1'];
                    $tpo_contact2 = $dataObj['tpo_contact2'];
                    $tpo_email  = $dataObj['tpo_email'];

                    //Additional info
                    $num_cmp    = $dataObj['num_cmp'];
                    $num_cmplab = $dataObj['num_cmplab'];
                    $min_num_cmp = $dataObj['min_num_cmp'];
                    $ispeed     = $dataObj['ispeed'];
                    $hall_cap   = $dataObj['hall_cap'];
                    $num_cctv   = $dataObj['num_cctv'];
                    $has_fiber  = $dataObj['has_fiber'];

                    //Courses
                    $course_length = $dataObj['courseLength'];
                    

                    //escaping college crediential
                    //Basic Details
                    $name_clean         = clean($con, $name);
                    $inst_code_clean    = clean($con, $inst_code);
                    $uid_clean          = clean($con, $uid);
                    $password_clean     = password_hash($password, PASSWORD_DEFAULT);   //Hashing the Password
                    $estd_clean         = clean($con, $estd);
                    $accrd_clean        = clean($con, $accrd);
                    $inst_type_clean    = clean($con, $inst_type);
                    $affli_clean        = clean($con, $affli);
                    $inst_appr_clean    = clean($con, $inst_appr);
                    $address_clean      = clean($con, $address);
                    $pin_clean          = clean($con, $pin);
                    $inst_state_clean   = clean($con, $inst_state);
                    $ins_dst_clean      = clean($con, $ins_dst);
                    $number_clean       = clean($con, $number);
                    $email_clean        = clean($con, $email);
                    $website_clean      = clean($con, $website);

                    //Head Details
                    $head_name_clean    = clean($con, $head_name);
                    $head_desg_clean    = clean($con, $head_desg);
                    $head_mob_clean     = clean($con, $head_mob);
                    $head_ph_clean      = clean($con, $head_ph);
                    $head_email_clean   = clean($con, $head_email);

                    //Tpo Details
                    $tpo_name_clean     = clean($con, $tpo_name);
                    $tpo_contact1_clean = clean($con, $tpo_contact1);
                    $tpo_contact2_clean = clean($con, $tpo_contact2);
                    $tpo_email_clean    = clean($con, $tpo_email);

                    //Additional info
                    $num_cmp_clean      = clean($con, $num_cmp);
                    $num_cmplab_clean   = clean($con, $num_cmplab);
                    $min_num_cmp_clean  = clean($con, $min_num_cmp);
                    $ispeed_clean       = clean($con, $ispeed);
                    $hall_cap_clean     = clean($con, $hall_cap);
                    $num_cctv_clean     = clean($con, $num_cctv);
                    $has_fiber_clean    = clean($con, $has_fiber);

                    //Check is already exist
                    $query_usr = "SELECT inst_code FROM cred WHERE inst_code ='".$inst_code_clean."' LIMIT 1";
                    $result_usr =  mysqli_query($con,$query_usr);
                    if(mysqli_num_rows($result_usr) > 0){
                        //If exists
                        $return['error'] = 'Already Registered';
                    }
                    else{
                        //If not exists
                        
                        $query_reg = "INSERT INTO cred(inst_name, inst_code, uid, pwd, estd, inst_accrd, inst_type, inst_affl, inst_aprv, state, district, pin, address, phone, email, website, head_name, inst_headdesg, head_contact, head_mob, head_email, tpo_name, tpo_ph, tpo_ph2, tpo_email, no_of_comp, num_cmplab, min_num_cmp, int_speed, hall_cap, fibop_lan, cctv_no, browser, inst_ip) VALUE('".$name_clean."','".$inst_code_clean."','".$uid_clean."','".$password_clean."','".$estd_clean."','".$accrd_clean."','".$inst_type_clean."','".$affli_clean."','".$inst_appr_clean."','".$inst_state_clean."','".$ins_dst_clean."','".$pin_clean."','".$address_clean."','".$number_clean."','".$email_clean."','".$website_clean."','".$head_name_clean."','".$head_desg_clean."','".$head_ph_clean."','".$head_mob_clean."','".$head_email_clean."','".$tpo_name_clean."','".$tpo_contact1_clean."','".$tpo_contact2_clean."','".$tpo_email_clean."','".$num_cmp_clean."','".$num_cmplab_clean."','".$min_num_cmp_clean."','".$ispeed_clean."','".$hall_cap_clean."','".$has_fiber_clean."','".$num_cctv_clean."','".$browser."','".$inst_ip."') ";
                        $return['sql'] = $query_reg;
                        if(mysqli_query($con,$query_reg)){
                            //first college data stored
                            //Looping for Course data
                            for($i = 0; $i < $course_length; $i ++){

                                //escaping
                                $degree_name_clean = clean($con, $degree_name[$i]);
                                $course_name_clean = clean($con, $course_name[$i]);
                                $course_value_clean = clean($con, $course_value[$i]);

                                //query - multiple at once
                                if($course_name_clean != '' && $course_value_clean != ''){

                                    $query_crs = '';
                                    $query_crs .= 'INSERT INTO college_crs(college_id, deg_optd, course_optd, intake) VALUES("'.$inst_code_clean.'","'.$degree_name_clean.'", "'.$course_name_clean.'", "'.$course_value_clean.'") ';
                                    if($query_crs != ''){
                                        if(mysqli_multi_query($con, $query_crs)){

                                            //return successful statements
                                            $return['result'] = 'successful';
                                            $return['redirect'] = './file_upload.php?inst_code='.$inst_code;

                                            //add a session for file upload
                                            
                                            $_SESSION['inst_code'] =(int)$inst_code;
                                        }
                                        else{
                                            $return['error'] = 'Putting course data in the DataBase is Failed. Try again later';
                                        }
                                    }
                                }
                                else{
                                    $return['error'] = "couse details is missing try once again";
                                }
                            }
                        }
                        else{
                            $return['error'] = "Putting data is the Data Base is failed. Try Again later. Maybe you are registered";
                        }//Course add
                    }//Institue does not exist
                } // recaptcha varified
                else{
                    $return['error'] = "reCARTCHA doesn't varify you";
                }
            }//recaptcha
            else{
                $return['error'] = "reCAPTCHA varification failed";
            }
        }//token(csrf)
        else{
            $return['error'] ="CSRF mismatched";
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;   
    }//Post req
?>