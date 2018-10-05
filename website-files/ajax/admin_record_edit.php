<?php

    /**
     * AjaxPage
     * 
     * Response- Admin College Record Delete
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/05/18
     * Time: 12:40 PM 
    */

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        //Always return Json format
        header('Content-Type: application/json');

        //return Variable
        $return = [];

        //POST variables
        //Credentials
        //Basic Details
        $name           = $_POST['name'];
        $inst_code      = $_POST['inst_code'];
        $uid            = $_POST['uid'];
        $password       = $_POST['password'];
        $estd           = $_POST['estd'];
        $accrd          = $_POST['accrd'];
        $inst_type      = $_POST['inst_type'];
        $affli          = $_POST['affli'];
        $inst_appr      = $_POST['inst_appr'];
        $address        = $_POST['address'];
        $pin            = $_POST['pin'];
        $inst_state     = $_POST['inst_state'];
        $ins_dst        = $_POST['ins_dst'];
        $number         = $_POST['number'];
        $email          = $_POST['email'];
        $website        = $_POST['website'];

        //Head Details
        $head_name      = $_POST['head_name'];
        $head_desg      = $_POST['head_desg'];
        $head_mob       = $_POST['head_mob'];
        $head_ph        = $_POST['head_ph'];
        $head_email     = $_POST['head_email'];

        //Tpo Details
        $tpo_name       = $_POST['tpo_name'];
        $tpo_contact1   = $_POST['tpo_contact1'];
        $tpo_contact2   = $_POST['tpo_contact2'];
        $tpo_email      = $_POST['tpo_email'];

        //Additional info
        $num_cmp        = $_POST['num_cmp'];
        $num_cmplab     = $_POST['num_cmplab'];
        $min_num_cmp    = $_POST['min_num_cmp'];
        $ispeed         = $_POST['ispeed'];
        $hall_cap       = $_POST['hall_cap'];
        $num_cctv       = $_POST['num_cctv'];
        $has_fiber      = $_POST['has_fiber'];
        $token          = $_POST['token'];

        if(XCSRF::varifycsrf('ad-clg-edit',$token)){

            //escaping college crediential
            //Basic Details
            $name_clean         = Filter::String(clean($name));
            $inst_code_clean    = Filter::Int(clean($inst_code));
            $uid_clean          = Filter::String(clean($uid));
            $estd_clean         = Filter::Int(clean($estd));
            $accrd_clean        = Filter::String(clean($accrd));
            $inst_type_clean    = Filter::String(clean($inst_type));
            $affli_clean        = Filter::String(clean($affli));
            $inst_appr_clean    = Filter::String(clean($inst_appr));
            $address_clean      = Filter::String(clean($address));
            $pin_clean          = Filter::Int(clean($pin));
            $inst_state_clean   = Filter::String(clean($inst_state));
            $ins_dst_clean      = Filter::String(clean($ins_dst));
            $number_clean       = Filter::Int(clean($number));
            $email_clean        = Filter::Email(clean($email));
            $website_clean      = Filter::URL(clean($website));

            //Head Details
            $head_name_clean    = Filter::String(clean($head_name));
            $head_desg_clean    = Filter::String(clean($head_desg));
            $head_mob_clean     = Filter::Int(clean($head_mob));
            $head_ph_clean      = Filter::Int(clean($head_ph));
            $head_email_clean   = Filter::Email(clean($head_email));

            //Tpo Details
            $tpo_name_clean     = Filter::String(clean($tpo_name));
            $tpo_contact1_clean = Filter::Int(clean($tpo_contact1));
            $tpo_contact2_clean = Filter::Int(clean($tpo_contact2));
            $tpo_email_clean    = Filter::Email(clean($tpo_email));

            //Additional info
            $num_cmp_clean      = Filter::Int(clean($num_cmp));
            $num_cmplab_clean   = Filter::Int(clean($num_cmplab));
            $min_num_cmp_clean  = Filter::Int(clean($min_num_cmp));
            $ispeed_clean       = Filter::Int(clean($ispeed));
            $hall_cap_clean     = Filter::Int(clean($hall_cap));
            $num_cctv_clean     = Filter::Int(clean($num_cctv));
            $has_fiber_clean    = Filter::String(clean($has_fiber));

            $smt_update = $pdocon->prepare("UPDATE cred SET estd = :estd, inst_accrd = :accrd, inst_type = :inst_type, inst_affl= :affli, inst_aprv = :inst_appr, state = :inst_state, district = :ins_dst, pin = :pin, address= :address, phone = :number, email= :email, website= :website, head_name = :head_name, inst_headdesg = :head_desg, head_contact = :head_ph, head_mob = :head_mob, head_email = :head_email, tpo_name = :tpo_name, tpo_ph = :tpo_contact1, tpo_ph2 = :tpo_contact2, tpo_email = :tpo_email, no_of_comp = :num_cmp, num_cmplab = :num_cmplab, min_num_cmp = :min_num_cmp, int_speed = :ispeed, hall_cap = :hall_cap, fibop_lan = :has_fiber, cctv_no = :num_cctv WHERE inst_code = :inst_code");

            if($smt_update->execute(array(':estd'=>$estd,':accrd'=>$accrd_clean,':inst_type'=>$inst_type_clean,':affli'=>$affli_clean,':inst_appr'=>$inst_appr_clean,':inst_state'=>$inst_state_clean,':ins_dst'=>$ins_dst_clean,':pin'=>$pin_clean,':address'=>$address_clean,':number'=>$number_clean,':email'=>$email_clean,':website'=>$website_clean,':head_name'=>$head_name_clean,':head_desg'=>$head_desg_clean,':head_ph'=>$head_ph_clean,':head_mob'=>$head_mob_clean,':head_email'=>$head_email_clean,':tpo_name'=>$tpo_name_clean,':tpo_contact1'=>$tpo_contact1_clean,':tpo_contact2'=>$tpo_contact2_clean,':tpo_email'=>$tpo_email_clean,':num_cmp'=>$num_cmp_clean,':num_cmplab'=>$num_cmplab_clean,':min_num_cmp'=>$min_num_cmp_clean,':ispeed'=>$ispeed_clean,':hall_cap'=>$hall_cap_clean,':has_fiber'=>$has_fiber_clean,':num_cctv'=>$num_cctv_clean,':inst_code'=>$inst_code_clean))){
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