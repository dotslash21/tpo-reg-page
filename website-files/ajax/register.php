<?php
    //Connection
    require("../inc/db-con.php");

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, $var);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' || 1){

        //Always return Json format
        header('Content-Type: application/json');

        //Credentials
        //Basic Details
        $name       = $_POST['name'];
        $inst_code  = $_POST['inst_code'];
        $uid        = $_POST['uid'];
        $password   = $_POST['password'];
        $estd       = $_POST['estd'];
        $accrd      = $_POST['accrd'];
        $inst_type  = $_POST['inst_type'];
        $affli      = $_POST['affli'];
        $inst_appr  = $_POST['inst_appr'];
        $address    = $_POST['address'];
        $pin        = $_POST['pin'];
        $inst_state = $_POST['inst_state'];
        $ins_dst    = $_POST['ins_dst'];
        $number     = $_POST['number'];
        $email      = $_POST['email'];
        $website    = $_POST['website'];

        //Head Details
        $head_name  = $_POST['head_name'];
        $head_desg  = $_POST['head_desg'];
        $head_mob   = $_POST['head_mob'];
        $head_ph    = $_POST['head_ph'];
        $head_email = $_POST['head_email'];

        //Tpo Details
        $tpo_name   = $_POST['tpo_name'];
        $tpo_contact1 = $_POST['tpo_contact1'];
        $tpo_contact2 = $_POST['tpo_contact2'];
        $tpo_email  = $_POST['tpo_email'];

        //Additional info
        $num_cmp    = $_POST['num_cmp'];
        $num_cmplab = $_POST['num_cmplab'];
        $min_num_cmp = $_POST['min_num_cmp'];
        $ispeed     = $_POST['ispeed'];
        $hall_cap   = $_POST['hall_cap'];
        $num_cctv   = $_POST['num_cctv'];
        $has_fiber  = $_POST['has_fiber'];

        //Courses
        $course_length = $_POST['courseLength'];
        $course_name = $_POST['courseName'];
        $course_value= $_POST['courseValue'];
        

        //escaping college crediential
        //Basic Details
        $name_clean         = clean($con, $name);
        $inst_code_clean    = clean($con, $inst_code);
        $uid_clean          = clean($con, $uid);
        $password_clean     = clean($con, $password);
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

        //return Variable
        $return = [];

        //Check is already exist
        $query_usr = "SELECT inst_code FROM cred WHERE inst_code ='".$inst_code."' LIMIT 1";
        $result_usr =  mysqli_query($con,$query_usr);
        if(mysqli_num_rows($result_usr) > 0){
            //If exists
            $return['error'] = 'User already exists';
        }
        else{
            //If not exists
            
            $query_reg = "INSERT INTO cred(     inst_name,       inst_code,             uid,                pwd,                estd,               inst_accrd,         inst_type,              inst_affl,          inst_aprv,              state,                  district,           pin,            address,            phone,              email,              website,            head_name,              inst_headdesg,          head_contact,       head_mob,               head_email,             tpo_name,               tpo_ph,                 tpo_ph2,                tpo_email,              no_of_comp,         num_cmplab,             min_num_cmp,            int_speed,          hall_cap,               fibop_lan,              cctv_no)
                                     VALUE('".$name_clean."','".$inst_code_clean."','".$uid_clean."','".$password_clean."','".$estd_clean."','".$inst_accrd_clean."','".$inst_type_clean."','".$affli_clean."','".$inst_appr_clean."','".$inst_state_clean."','".$ins_dst_clean."','".$pin_clean."','".$address_clean."','".$number_clean."','".$email_clean."','".$website_clean."','".$head_name_clean."','".$head_desg_clean."','".$head_ph_clean."','".$head_mob_clean."','".$head_email_clean."','".$tpo_name_clean."','".$tpo_contact1_clean."','".$tpo_contact2_clean."','".$tpo_email_clean."','".$num_cmp_clean."','".$num_cmplab_clean."','".$min_num_cmp_clean."','".$ispeed_clean."','".$hall_cap_clean."','".$has_fiber_clean."','".$num_cctv_clean."') ";
            
            if(mysqli_query($con,$query_reg)){
                //first college data stored
                $return['first_sub'] = "First Submitting Done";
                //Looping for Course data
                for($i = 0; $i < $course_length; $i ++){

                    //escaping
                    $course_name_clean = clean($con, $course_name[$i]);
                    $course_value_clean = clean($con, $course_value[$i]);

                    //query - multiple at once
                    if($course_name_clean != '' && $course_value_clean != ''){

                        $query_crs .= 'INSERT INTO college_crs(college_id, deg_optd, intake) 
                                            VALUES("'.$inst_code.'", "'.$course_name_clean.'", "'.$course_value_clean.'") ';
                        if($query_crs != ''){

                            if(mysqli_multi_query($con, $query_crs)){

                                //return successful statements
                                $return['result'] = 'Successful';
                                $return['redirect'] = './file_upload.php';
                            }
                        }
                    }
                }
            }
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;        
    }
?>