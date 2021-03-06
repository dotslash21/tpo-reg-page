<?php

    /**
     * AjaxPage
     * 
     * Response- Admin Notice view
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/05/18
     * Time: 12:40 PM 
    */

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        header('Content-Type: application/json');   //Reply json

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        $return = [];

        if(XCSRF::varifycsrf('ad-nt-vw', $_POST['token'])){

            
            if(admin::ajaxCheck()){   //Admin is logged in

                if(isset($_POST['action'])){
                    if($_POST['action'] == 'none'){

                        //Getting notice data action
                        $return['action'] = 'get';

                        if(isset($_POST['id']) && $_POST['id'] == 1){

                            $value = '';
                            $sl_no = 1;
        
                            $smt_notice = $pdocon->prepare("SELECT sl_no, title, content, publish_date, expiry_date, active_status FROM `notices` ORDER BY active_status DESC, expiry_date DESC");
                            $smt_notice->execute();
        
                            while ($result_notice = $smt_notice->fetch(PDO::FETCH_ASSOC)) {
        
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
                    //Editing action
                    else if($_POST['action'] == 'edit'){

                        $return['action'] = 'edit';

                        if(isset($_POST['id'])){
                            $id = $_POST['id'];

                            //Successfully called editting request
                            $return['red'] = './notice_edit.php?n_id='.$id."&q=".XCSRF::mkcsrf('ad-nt-edt');
                        }
                    }
                    //deleting action
                    else if($_POST['action'] == 'delete'){

                        $return['action'] = 'delete';

                        if(isset($_POST['id'])){
                            $id = $_POST['id'];
                            $return['id'] = $id;
                            
                            $_POST['n_id'] = $id;
                            $_POST['n_token'] = $_POST['token'];

                            //Successfully called deleting request
                            $smt_del =$pdocon->prepare("DELETE FROM `notices` WHERE sl_no = :id ");
                            $smt_del->execute(array(':id'=> $id));
                            if ($smt_del->rowCount() > 0){
                                //Deleted the notice
                                $success = true;
                                $return['result'] = "Successfully Deleted Notice";
                            }
                            else{
                                //Failed to delete courses
                                $success = false;
                                $return['error'] = "Failed to Delete Notice";
                            }
                            $return['success'] = $success;
                        }
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