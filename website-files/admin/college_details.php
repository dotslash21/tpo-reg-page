<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        echo "You need to fill the whole form";
        exit;
    }

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
            <h3 class="center-align">COLLEGE DETAILS</h3>
            <hr>
            <br>

            <div class="row">
                <div class="col s10">
                </div>
                <div class="col s2">
                    <button class="btn btn-large waves-effect waves-light blue darken-1">
                        PRINT ALL DETAILS
                    </button>
                </div>
            </div>

            <ul class="collapsible popout" data-collapsible="expandable">
                <?php
                    $sql_clg = "SELECT inst_name FROM cred ORDER BY inst_name ASC";
                    $res_clg = mysqli_query($con,$sql_clg);
                    while($res_arr = mysqli_fetch_array($res_clg)){
                ?>
                <li>
                    <div class="collapsible-header valign-wrapper js-click">
                        <i class="material-icons">account_balance</i><?php echo $res_arr['inst_name']; ?>
                        <div class="panel_options">
                            <input type="checkbox" id="approve">
                            <label for="approve">Approve</label>   
                            <button class="waves-effect waves-yellow btn yellow darken-3">EDIT</button>
                            <button class="waves-effect waves-red btn red lighten-2">DELETE</button>
                            <button class="waves-effect waves-blue btn blue lighten-2">PRINT</button>
                        </div>
                    </div>
                    <div class="collapsible-body">
                        
                    </div>
                </li>
                <?php
                    }
                ?>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">account_balance</i>Government College of Engineering & Textile Technology, Berhampore
                        <div class="panel_options">
                            <input type="checkbox" id="approve">
                            <label for="approve">Approve</label>   
                            <a href="" class="waves-effect waves-yellow btn yellow darken-3">EDIT</a>
                            <a class="waves-effect waves-red btn red lighten-2">DELETE</a>
                            <a class="waves-effect waves-blue btn blue lighten-2">PRINT</a>
                        </div>
                    </div>
                    <div class="collapsible-body">
                        <span>Lorem ipsum dolor sit amet.</span>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">account_balance</i>Government College of Engineering and Leather Technology
                        <div class="panel_options">
                            <input type="checkbox" id="approve">
                            <label for="approve">Approve</label>   
                            <a href="" class="waves-effect waves-yellow btn yellow darken-3">EDIT</a>
                            <a class="waves-effect waves-red btn red lighten-2">DELETE</a>
                            <a class="waves-effect waves-blue btn blue lighten-2">PRINT</a>
                        </div>
                    </div>
                    <div class="collapsible-body">
                        <span>Lorem ipsum dolor sit amet.</span>
                    </div>
                </li>
            </ul>
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
    <script src="../assets/js/admin_clg.js"></script>
    <script>
        $(".button-collapse").sideNav();
    </script>
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
        $('select').material_select('destroy');
    </script>
    <script>
        $(document).ready(function () {
            $('.collapsible').collapsible();
        });
    </script>
</body>

</html>