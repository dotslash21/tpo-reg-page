<?php
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ./login.php?lf=yes');     //If admin is not logged in, then back to login page
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

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

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        a {
            color: inherit;
        }
    </style>
</head>

<body>
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-wrapper blue darken-3 z-depth-1-half">
            <a href="#!" class="brand-logo center">ADMIN LOGIN PANEL</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Profile</a></li>
                <li><a href="./logout.php">Log Out</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="#">Profile</a></li>
                <li><a href="./logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <!-- MAIN FORM BODY-->
    <main>
        <div class="container z-depth-3" id="form-container">
            <div class="row">
                <div class="col l4 s12">
                    <a href="course_add.php">
                        <div class="card-panel valign-wrapper center-align waves-effect waves-red waves-block red lighten-3">
                            <i class="material-icons medium">add</i>
                            <p>ADD COURSES</p>
                        </div>
                    </a>
                </div>
                <div class="col l4 s12">
                    <a href="college_details.php">
                        <div class="card-panel valign-wrapper center-align waves-effect waves-orange waves-block orange lighten-3">
                            <i class="material-icons medium">pageview</i>
                            <p>COLLEGE DETAILS</p>
                        </div>
                    </a>
                </div>
                <div class="col l4 s12">
                    <a href="course_list.php">
                        <div class="card-panel valign-wrapper center-align waves-effect waves-green waves-block green lighten-3">
                            <i class="material-icons medium">format_list_numbered</i>
                            <p>COURSE LIST</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col l4 s12">
                    <a href="notice_panel.php">
                        <div class="card-panel valign-wrapper center-align waves-effect waves-blue waves-block blue lighten-3">
                            <i class="material-icons medium">note_add</i>
                            <p>NOTICE</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="page-footer blue darken-3">
        <div class="footer-copyright blue darken-4">
            <div class="container">
                Copyright © 2018. CPC, West Bengal
                <a class="grey-text text-lighten-4 right" href="../dev.html">Designed at GCETTB</a>
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
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>
</body>

</html>
