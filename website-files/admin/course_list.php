<?php

    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('Location: ./login.php?lf=yes');
        exit;
    }
    define("_CON_",true);
    require("../inc/db-con.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel | CPC TPO Registration</title>
    <meta charset="utf-8" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        #form-container {
            padding: 2em 0.5em 2em 0.5em;
            margin-top: -1em;
            margin-bottom: 2em;
        }

        .admin-button {
            margin: 0.2em;
        }

        .panel_options {
            margin-left: auto;
        }

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>

<body>
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-wrapper blue darken-3 z-depth-1-half">
            <a href="dashboard.php" class="brand-logo center">ADMIN DASHBOARD</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>
                    <a href="dashboard.php">Home</a>
                </li>
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="./logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- MAIN FORM BODY-->
    <main>
        <div class="container z-depth-3" id="form-container">
            <?php
                $sql_show = "SELECT DISTINCT degree from course_list";
                $degree_list = mysqli_query($con, $sql_show);
                while($deg_list = mysqli_fetch_array($degree_list)){

            ?>
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4><?php echo $deg_list['degree']; ?></h4>
                </li>
                <?php
                    $sql_show = "SELECT course_name from course_list WHERE degree = '".$deg_list['degree']."'";
                    $course_list = mysqli_query($con, $sql_show);
                    while($crse_list = mysqli_fetch_array($course_list)){
                ?>
                <li class="collection-item">
                    <i class="material-icons tiny">chevron_right</i> <?php echo $crse_list['course_name']; ?>
                </li>
            
                <?php
                    }
                ?>
            </ul>
            
            <?php
                }
            ?>

        </div>
    </main>

    <footer class="page-footer blue darken-3">
        <div class="footer-copyright blue darken-4">
            <div class="container">
                Copyright © 2018. CPC, West Bengal
                <a class="grey-text text-lighten-4 right" href="http://gcettb.ac.in/home">Designed at GCETTB</a>
            </div>
        </div>
    </footer>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        $(".button-collapse").sideNav();
    </script>
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
        $('select').material_select('destroy');
    </script>
</body>

</html>