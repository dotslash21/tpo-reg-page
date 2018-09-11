<?php
    define("_CON_",true);
    //Connection
    require("../inc/db-con.php");

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, htmlspecialchars($var,ENT_QUOTES));
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        header('Content-Type: application/json');   //Reply json

        session_start();
        if(isset($_POST['token']) && $_POST['token'] == $_SESSION['token']){

            $return = [];
            if(isset($_SESSION['admin_id'])){   //Admin is logged in

                if(isset($_POST['action'])){
                    if($_POST['action'] == 'none'){

                        //Getting notice data action
                        $return['action'] = 'get';

                        if(isset($_POST['id']) && $_POST['id'] == 1){

                            $value = '';
                            $sl_no = 1;
        
                            $sql_notice = "SELECT sl_no, title, content, publish_date, expiry_date, active_status FROM `notices` ORDER BY active_status DESC, expiry_date DESC";
                            $result= mysqli_query($con, $sql_notice);
        
                            while ($result_notice = mysqli_fetch_array($result)) {
        
                                if($result_notice['active_status'] == 1){
                                    $status = "notice_active";
                                }
                                else{
                                    $status = "notice_inactive";
                                }
                                $value .=   "<div class=\"row z-depth-1-half notice-panel ".$status." valign-wrapper\">";
                                $value .=       "<div class=\"col s1 center-align\">".$sl_no."</div>";
                                $value .=       "<div class=\"col s4\">".$result_notice['title']."</div>";
                                $value .=       "<div class=\"col s2\">".date("d-M-Y", $result_notice['publish_date'])."</div>";
                                $value .=       "<div class=\"col s2\">".date("d-M-Y", $result_notice['expiry_date'])."</div>";
                                $value .=       "<div class=\"col s3\">";
                                $value .=           "<button class=\"waves-effect waves-yellow btn yellow darken-3 edit_btn\" id=\"".$result_notice['sl_no']."\">EDIT</button>";
                                $value .=           "<button class=\"waves-effect waves-red btn red lighten-2 delete-btn\" id=\"".$result_notice['sl_no']."\">DELETE</button>";
                                $value .=       "</div>";
                                $value .=   "</div>";
                                $sl_no += 1;
                            }
        
                            $return['notices'] = $value;
                        }
                    }
                    else if($_POST['action'] == 'edit'){

                        //Editing action
                        $return['action'] = 'edit';
                    }
                    else if($_POST['action'] == 'delete'){

                        //deleting action
                        $return['action'] = 'delete';
                    }
                    else{

                        //No action mentioned
                        $return['action'] = 'none';
                    } //action execute
                } //action check
            } //admin login
        } //token

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }
?>