<?php
    //Connection
    $con = '';

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
        
        //return Variable
        $return = [];

        //escaping function
        function clean($con, $var){
            return mysqli_real_escape_string($con, $var);
        }

        //Check is already exist
        $query_usr = "SELECT inst_code FROM cred WHERE inst_code ='".$inst_code."' LIMIT 1";
        $result_usr =  mysqli_query($con,$query_usr);
        if(mysqli_num_rows($result_usr) > 0){
            //If exists
            $return['error'] = 'User already exists';
        }
        else{
            //If not exists
            
            //Looping for Course data
            for($i = 0; $i < $course_length; $i ++){
                //escaping
                $course_name_clean = clean($con, $course_name[$i]);
                $course_value_clean = clean($con, $course_value[$i]);

                //query - multiple at once
                $query .='';
            }
        }

        

        $return['message'] = 'done';

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;        
    }
?>