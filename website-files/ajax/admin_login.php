<?php
    define("_CON_",true);
    //Connection
    require("../inc/db-con.php");

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, $var);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        function get_client_ip() {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
            return $ipaddress;
        }

        $current_time = date("Y/M/d g:i:s A T P");
        $current_ip = get_client_ip();

        session_start();
        //Always return Json format
        header('Content-Type: application/json');

        //return array
        $return = [];
        
        //Geetin Variables
        $id = $_POST['id'];
        $password = $_POST['password'];

        //Escaping variables
        $id_clean = clean($con,$id);
        $password_clean = clean($con,$password);

        //Check if admin already exist or not
        $query_admin = "SELECT id,password FROM admins WHERE id ='".$id_clean."' LIMIT 1";
        $result_admin =  mysqli_query($con,$query_admin);
        if(mysqli_num_rows($result_admin) > 0){
            //Admin exists
            $admin_details = mysqli_fetch_array($result_admin);
            $admin_id = $admin_details['id'];
            $hash = $admin_details['password'];
            if($password_clean == 'admin'){
                //User get signed in
                $query_add_val= "UPDATE admins SET Last_login_time= '".$current_time."', Last_login_ip = '".$current_ip."' WHERE id = '".$admin_id."' ";
                if(mysqli_query($con, $query_add_val)){
                    $return['redirect'] = './dashboard.php';
                    $_SESSION['admin_id'] = $admin_id;
                }
            }
            else{
                //Invalid user email/password
                $return['error'] = "Invalid User email/password";
            }

        }
        else{
                $return['error'] = "Admin Id is wrong";
        }
        //Make sure the user can be added and is added

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }
?>