<?php

    /**
     * AjaxPage
     * 
     * Response- Admin Individual College dertails
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/05/18
     * Time: 12:40 PM 
    */

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        $inst_code = Filter::String(clean($_GET['inst_code']));

        //Credential
        $smt_inst = $pdocon->prepare("SELECT * FROM cred WHERE inst_code = :inst_code");
        $smt_inst->execute(array(':inst_code' => $inst_code));
        $result_arr = $smt_inst->fetch(PDO::FETCH_ASSOC);

        //Course
        $smt_crs = $pdocon->prepare("SELECT * FROM college_crs WHERE college_id = :inst_code ORDER BY deg_optd ASC");
        $smt_crs->execute(array(':inst_code'=>$inst_code));
        //Fetch is below

        header('Content-Type: application/json');

        //return variable
        $return = [];

        //Making a return value 
        $value ='';
        $value .=   '<h5>'.$result_arr['inst_name'].'</h5><hr>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6" id="uid-'.$inst_code.'">Institute ID: '.$result_arr['uid'].'</div>';
        $value .=        '<div class="col s6">Institute Code: '.$result_arr['inst_code'].'</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Establishment Year: '.$result_arr['estd'].'</div>';
        $value .=       '<div class="col s6">Accredition: '.$result_arr['inst_accrd'].'</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Insitute Type:'.$result_arr['inst_type'].'</div>';
        $value .=       '<div class="col s6">Institute Affiliation: '.$result_arr['inst_affl'].'</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Institute Approval: '.$result_arr['inst_aprv'].'</div>';
        $value .=       '<div class="col s6"></div>';
        $value .=   '</div>';
        $value .=   '<hr>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Institute Address: '.$result_arr['address'].'</div>';
        $value .=       '<div class="col s6">Pin: '.$result_arr['pin'].'</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">State: '.$result_arr['state'].'</div>';
        $value .=       '<div class="col s6">District: '.$result_arr['district'].'</div>';
        $value .=   '</div>';
        $value .=   '<hr>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Contact Number: '.$result_arr['phone'].'</div>';
        $value .=       '<div class="col s6">E-Mail: '.$result_arr['email'].'</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Website:'.$result_arr['website'].'</div>';
        $value .=       '<div class="col s6"></div>';
        $value .=   '</div>';
        $value .=   '<hr>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Institute Head Name: '.$result_arr['head_name'].'</div>';
        $value .=       '<div class="col s6">Designation: '.$result_arr['inst_headdesg'].'</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Contact (Mobile): '.$result_arr['head_mob'].'</div>';
        $value .=       '<div class="col s6">Contact (Landline): '.$result_arr['head_contact'].'</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">E-Mail: '.$result_arr['head_email'].'</div>';
        $value .=       '<div class="col s6"></div>';
        $value .=   '</div>';
        $value .=   '<hr>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">TPO Name: '.$result_arr['tpo_name'].'</div>';
        $value .=       '<div class="col s6">Contact (1): '.$result_arr['tpo_ph'].'</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Contact (2): '.$result_arr['tpo_ph2'].'</div>';
        $value .=       '<div class="col s6">E-Mail: '.$result_arr['tpo_email'].'</div>';
        $value .=   '</div>';
        $value .=   '<hr>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Total number of computers: '.$result_arr['no_of_comp'].'</div>';
        $value .=       '<div class="col s6">Total number of computer lab: '.$result_arr['num_cmplab'].'</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Minimum number of computers in lab: '.$result_arr['min_num_cmp'].'</div>';
        $value .=       '<div class="col s6">Internet Speed: '.$result_arr['int_speed'].' Kbps</div>';
        $value .=   '</div>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6">Total Hall capacity: '.$result_arr['hall_cap'].'</div>';
        $value .=       '<div class="col s6">Total CCTV cameras in lab: '.$result_arr['cctv_no'].'</div>';
        $value .=   '</div>';
        $value .=   '<hr>';
        $value .=   '<h5 id="cd">Course Details</h5>';
        $value .=   '<hr>';
        $value .=   '<div class="row">';
        $value .=       '<div class="col s6 center"><b>Course Name</b></div>';
        $value .=       '<div class="col s6 center"><b>Intake</b></div>';
        $value .=   '</div>';
        // Course Details
        while ($array_crs = $smt_crs->fetch(PDO::FETCH_ASSOC)) { 
            $value .=   '<hr>';
            $value .=   '<div class="row">';
            $value .=       '<div class="col s6 center">'.$array_crs['deg_optd'].' - '.$array_crs['course_optd'].'</div>';
            $value .=       '<div class="col s6 center">'.$array_crs['intake'].'</div>';
            $value .=   '</div>';
        }
        $value .=   '<hr>';
        $value .=   '<h5 id="cd">Uploaded File</h5>';
        $value .=   '<hr>';

        if(strlen($result_arr['upload']) < 1 ){
            //No file is their
            $say = "No file is Found";
            $say_1 = 0;
        }
        else{
            $say = "One File uploaded";
            $say_1 = 1;
        }

        $value .=   '<div class="row">';
        $value .=       '<div class="col s6 center">'.$say.'</div>';
        $value .=       '<div class="col s6 center">';
        if($say_1):
            $value .=       '<a href="../upload/institute/"'.$result_arr['upload'].' target="_blank">Click to View the File</a>';
        endif;
        $value .=       '</div>';
        $value .=   '</div>';
        

        $return['value'] = $value;
        
        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;

    }
?>