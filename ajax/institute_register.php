<?php

    /**
     * AjaxPage
     * 
     * Response- Institute Register
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/05/18
     * Time: 12:40 PM 
    */

    if($_SERVER['REQUEST_METHOD'] == 'POST'){


        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

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

                    // Getting Tokens
                    $token1 = $dataObj['token1'];
                    $token2 = $dataObj['token2'];
                    $token3 = $dataObj['token3'];
                    $token4 = $dataObj['token4'];

                    //Check for tokens exists
                    if (isset($token1) && isset($token2) && isset($token3) && isset($token4)){
                        // If all forms tokens are received

                        if(instTokenMatch(1, $token1) && instTokenMatch(2, $token2) && instTokenMatch(3, $token3) && instTokenMatch(4, $token4)) {
                            //If all received tokens are perfectly matched

                            $browser = $_SERVER['HTTP_USER_AGENT'];
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
                            $name_clean         =Filter::String(clean($name));
                            $inst_code_clean    =Filter::Int(clean($inst_code));
                            $uid_clean          =Filter::String(clean($uid));
                            $password_clean     =Filter::String(clean($password));
                            $estd_clean         =Filter::Int(clean($estd));
                            $accrd_clean        =Filter::String(clean($accrd));
                            $inst_type_clean    =Filter::String(clean($inst_type));
                            $affli_clean        =Filter::String(clean($affli));
                            $inst_appr_clean    =Filter::String(clean($inst_appr));
                            $address_clean      =Filter::String(clean($address));
                            $pin_clean          =Filter::Int(clean($pin));
                            $inst_state_clean   =Filter::String(clean($inst_state));
                            $ins_dst_clean      =Filter::String(clean( $ins_dst));
                            $number_clean       =Filter::Int(clean($number));
                            $email_clean        =Filter::Email(clean($email));
                            $website_clean      =Filter::URL(clean($website));

                            //Head DetailsFilter
                            $head_name_clean    =Filter::String(clean($head_name));
                            $head_desg_clean    =Filter::String(clean($head_desg));
                            $head_mob_clean     =Filter::Int(clean($head_mob));
                            $head_ph_clean      =Filter::Int(clean($head_ph));
                            $head_email_clean   =Filter::Email(clean($head_email));

                            //Tpo DetailsFilter
                            $tpo_name_clean     =Filter::String(clean($tpo_name));
                            $tpo_contact1_clean =Filter::Int(clean($tpo_contact1));
                            $tpo_contact2_clean =Filter::Int(clean($tpo_contact2));
                            $tpo_email_clean    =Filter::Email(clean($tpo_email));

                            //Additional infoFilter
                            $num_cmp_clean      =Filter::Int(clean($num_cmp));
                            $num_cmplab_clean   =Filter::Int(clean($num_cmplab));
                            $min_num_cmp_clean  =Filter::Int(clean($min_num_cmp));
                            $ispeed_clean       =Filter::Int(clean($ispeed));
                            $hall_cap_clean     =Filter::Int(clean($hall_cap));
                            $num_cctv_clean     =Filter::Int(clean($num_cctv));
                            $has_fiber_clean    =Filter::Int(clean($has_fiber));

                            $findInst = $pdocon->prepare("SELECT inst_code FROM cred WHERE inst_code =:inst_code LIMIT 1");
                            $findInst->execute(array(':inst_code'=>$inst_code_clean));

                            if((int) $findInst->rowCount() > 0){
                                $return['error'] = 'Already Registered';
                            }
                            else{
                                //If not exists

                                $password_new = password_hash($password_clean, PASSWORD_DEFAULT);

                                $smtAdd = $pdocon->prepare("INSERT INTO cred(inst_name, inst_code, uid, pwd, estd, inst_accrd, inst_type, inst_affl, inst_aprv, state, district, pin, address, phone, email, website, head_name, inst_headdesg, head_contact, head_mob, head_email, tpo_name, tpo_ph, tpo_ph2, tpo_email, no_of_comp, num_cmplab, min_num_cmp, int_speed, hall_cap, fibop_lan, cctv_no, browser, inst_ip) VALUE(:name,:inst_code,:uid,:password,:estd,:accrd,:inst_type,:affli,:inst_appr,:inst_state,:ins_dst,:pin,:address,:number,:email,:website,:head_name,:head_desg,:head_ph,:head_mob,:head_email,:tpo_name,:tpo_contact1,:tpo_contact2,:tpo_email,:num_cmp,:num_cmplab,:min_num_cmp,:ispeed,:hall_cap,:has_fiber,:num_cctv,:browser,:inst_ip)");
                                if($smtAdd->execute(array(':name' =>$name_clean,':inst_code' =>$inst_code_clean,':uid'=>$uid_clean,':password'=>$password_new,':estd'=>$estd_clean,':accrd'=>$accrd_clean,':inst_type'=>$inst_type_clean,':affli'=>$affli_clean,':inst_appr'=>$inst_appr_clean,':inst_state'=>$inst_state_clean,':ins_dst'=>$ins_dst_clean,':pin'=>$pin_clean,':address'=>$address_clean,':number'=>$number_clean,':email'=>$email_clean,':website'=>$website_clean,':head_name'=>$head_name_clean,':head_desg'=>$head_desg_clean,':head_ph'=>$head_ph_clean,':head_mob'=>$head_mob_clean,':head_email'=>$head_email_clean,':tpo_name'=>$tpo_name_clean,':tpo_contact1'=>$tpo_contact1_clean,':tpo_contact2'=>$tpo_contact2_clean,':tpo_email'=>$tpo_email_clean,':num_cmp'=>$num_cmp_clean,':num_cmplab'=>$num_cmplab_clean,':min_num_cmp'=>$min_num_cmp_clean,':ispeed'=>$ispeed_clean,':hall_cap'=>$hall_cap_clean,':has_fiber'=>$has_fiber_clean,':num_cctv'=>$num_cctv_clean,':browser'=>$browser,':inst_ip'=>$inst_ip))){

                                    $crsEntry = false;

                                    $smtCrs = $pdocon->prepare("INSERT INTO college_crs(college_id, deg_optd, course_optd, intake) VALUES(:inst_code_clean,:degree_name_clean, :course_name_clean, :course_value_clean)");

                                    if($smtCrs){

                                        for($i = 0; $i < $course_length; $i ++){

                                            //escaping
                                            $degree_name_clean  = Filter::String(clean($degree_name[$i]));
                                            $course_name_clean  = Filter::String(clean($course_name[$i]));
                                            $course_value_clean = Filter::Int(clean($course_value[$i]));

                                            //query - multiple at once
                                            if($course_name_clean != '' && $course_value_clean != ''){

                                                if($smtCrs->execute(array(':inst_code_clean'=>$inst_code_clean,':degree_name_clean'=>$degree_name_clean, ':course_name_clean'=>$course_name_clean, ':course_value_clean'=>$course_value_clean))){
                                                    //Data put successfully
                                                    $crsEntry = true;
                                                }
                                                else{
                                                    $crsEntry = false;
                                                }
                                            }
                                        }
                                        if($crsEntry){
                                            //return successful statements
                                            $return['result'] = 'successful';
                                            $return['redirect'] = './upload';

                                            //add a session for file upload

                                            $_SESSION['inst_code'] =(int)$inst_code;
                                        }
                                        else{
                                            $return['error'] = 'Putting course data in the DataBase is Failed. Try again later';
                                        }
                                    }
                                    else {
                                        $return['error'] = 'Pursing Error';
                                    }
                                }
                                else{
                                    $return['error'] = "Putting data is the Data Base is failed. Try Again later. Maybe you are registered";
                                }//Instittute creadential
                            }//Institue does not exist
                        }
                        else {
                            $return['error'] = "Form tokens are not matched";
                        }
                    }
                    else {
                        $return['error'] = "Incomplete Request, unable to proceed";
                    }

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
