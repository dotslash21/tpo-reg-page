<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $return = [];

        if($_POST['chk'] == 1){

            session_start();
            if(isset($_SESSION['admin_id'])){

                define('_incFuncwwrfbhdjrt',true);
                require '../inc/func.php';

                $token = $_POST['token'];
                $degree = $_POST['degree'];
                $course = $_POST['course'];
                if(XCSRF::varifycsrf('ad-clg-det',$token)){
    
                    //Always return Json format
                    header('Content-Type: application/json');

                    $return['done'] = XCSRF::mkcsrf('ad-print-all');

                    if($degree == 'all'){
                        $de_return = "degree[]=". $degree;
                    }
                    else {
                        $de_count = count($degree);
                        $de_return = '';
                        for ($i=0; $i < $de_count; $i++) { 
                            $de_return .= "degree[]=". $degree[$i];
                        }
                    }

                    $return['degree'] = '';
                    $return['course'] = '';

                }
                else{
                    $return['error'] = "Not varfied";
                }
            }
            else {
                $return['error'] = "Admin is not logged in";
            }
        }
        else {
            $return['error'] = "Check is not varified";
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }

?>