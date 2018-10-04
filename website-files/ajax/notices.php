<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['id'])){
            if($_POST['id'] == 1){

                define('_incFuncwwrfbhdjrt',true);
                require '../inc2357v3cn425073p4y53w79/func.php';

                //Always return Json format
                header('Content-Type: application/json');

                $return = [];

                //Notice value change                
                $current_time = time();

                $smt_update = $pdocon->prepare("UPDATE `notices` SET active_status = 0 WHERE expiry_date < :current_time");
                if($smt_update->execute(array(':current_time'=>$current_time))){
                    $value = '';
                    //Sql for getting data
                    $stmt = $pdocon->prepare("SELECT title, content, publish_date, expiry_date, file_name FROM `notices` ORDER BY expiry_date DESC");
                    $stmt->execute();
                    while($result_arr = $stmt->fetch(PDO::FETCH_ASSOC)){

                        $pub_date = date("M. d, Y", $result_arr['publish_date']);
                        $exp_date = date("M. d, Y", $result_arr['expiry_date']);

                        //Check for file exists
                        if(strlen($result_arr['file_name']) < 1 ){
                            $des = "disabled";
                        }
                        else {
                            $des = '';
                        }

                        $value .= "<tr>";
                        $value .=   "<td>".$result_arr['title']."</td>";
                        $value .=   "<td>".$pub_date."</td>";
                        $value .=   "<td>".$exp_date."</td>";
                        $value .=   "<td>".$result_arr['content']."</td>";
                        $value .=   "<td>";
                        $value .=       "<a href=\"./upload/notice/".$result_arr['file_name']."\" class=\"btn btn-info btn-xs\" target=\"_blank\" ".$des.">";
                        $value .=       "<span class=\"glyphicon glyphicon-download-alt\"></span>Download</a>";
                        $value .=   "</td>";
                        $value .=   "</tr>";
                    }
                }

                $return['notices'] = $value;

                echo json_encode($return, JSON_PRETTY_PRINT);
                exit;
            }
        }
    }
?>