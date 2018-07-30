<?php

    //Connection
    require("../inc/db-con.php");

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, $var);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

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
                $return['redirect'] = './dashboard.php';
                $_SESSION['admin_id'] = $admin_id;
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