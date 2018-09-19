<?php

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, $var);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        session_start();
        require '../inc/func.php';

        //Always return Json format
        header('Content-Type: application/json');

        //return Variable
        $return = [];

        //POST variables
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
        $token      = $_POST['token'];

        if(XCSRF::varifycsrf('ad-clg-edit',$token)){

            define("_CON_",true);
            //Connection
            require("../inc/db-con.php");

            //escaping college crediential
            //Basic Details
            $name_clean         = clean($con, $name);
            $inst_code_clean    = clean($con, $inst_code);
            $uid_clean          = clean($con, $uid);
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

            $query_update = "UPDATE cred SET estd = '".$estd_clean."', inst_accrd = '".$accrd_clean."', inst_type = '".$inst_type_clean."', inst_affl= '".$affli_clean."', inst_aprv = '".$inst_appr_clean."', state = '".$inst_state_clean."', district = '".$ins_dst_clean."', pin = '".$pin_clean."', address= '".$address_clean."', phone = '".$number_clean."', email= '".$email_clean."', website= '".$website_clean."', head_name = '".$head_name_clean."', inst_headdesg = '".$head_desg_clean."', head_contact = '".$head_ph_clean."', head_mob = '".$head_mob_clean."', head_email = '".$head_email_clean."', tpo_name = '".$tpo_name_clean."', tpo_ph = '".$tpo_contact1_clean."', tpo_ph2 = '".$tpo_contact2_clean."', tpo_email = '".$tpo_email_clean."', no_of_comp = '".$num_cmp_clean."', num_cmplab = '".$num_cmplab_clean."', min_num_cmp = '".$min_num_cmp_clean."', int_speed = '".$ispeed_clean."', hall_cap = '".$hall_cap_clean."', fibop_lan = '".$has_fiber_clean."', cctv_no = '".$num_cctv_clean."' WHERE inst_code = '".$inst_code_clean."'";
            $return['sql'] = $query_update;
            if(mysqli_query($con,$query_update)){
                // college data stored
                $return['result'] = 'Successfully Changed';
                $return['redirect'] = './college_details.php?change='.$inst_code;
            }
            else{
                $return['error'] = "Putting data is the Data Base is failed. Try Again later. Maybe you are registered";
            }
        }
    
        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;        
    }
?>