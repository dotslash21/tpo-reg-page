<?php
    define("_CON_",true);
    //Connection
    require("../inc/db-con.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['id'])){
            if($_POST['id'] == 1){

                //Always return Json format
                header('Content-Type: application/json');

                $return = [];

                //Notice value change                
                $current_time = time();
                $sql_update = "UPDATE `notices` SET active_status = 0 WHERE expiry_date < ".$current_time."";
                if(mysqli_query($con, $sql_update)){
                    $value = '';
                    //Sql for getting data
                    $sql = "SELECT title, content, publish_date, expiry_date, file_name FROM `notices` ORDER BY expiry_date DESC";
                    $result= mysqli_query($con, $sql);
                    while($result_arr = mysqli_fetch_array($result)){

                        $pub_date = date("M. d, Y", $result_arr['publish_date']);
                        $exp_date = date("M. d, Y", $result_arr['expiry_date']);

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