<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: ./login.php?lf=yes');
    exit;
}

$r = md5(rand());        //a random variable
$_SESSION['token'] = $r;
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
    <meta name="token" content="<?php echo $r; ?>">
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

        .notice-panel {
            padding-top: 2.5vh;
            padding-bottom: 2.5vh;
        }

        .notice_active {
            border-left: 1vh solid #00c853;
        }

        .notice_inactive {
            border-left: 1vh solid #e53935;
        }

    </style>
</head>

<body>
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-wrapper blue darken-3 z-depth-1-half">
            <a href="#!" class="brand-logo center">NOTICE PANEL</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="./notice_panel.php">Back</a>
                </li>
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="./logout.php">Log Out</a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li>
                    <a href="./notice_panel.php">Back</a>
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
        <div class="container" id="form-container">

            <!-- HEADING START-->
            <div class="row">
                <div class="col s1">
                    <strong>Sl No.</strong>
                </div>
                <div class="col s4">
                    <strong>Title</strong>
                </div>
                <div class="col s2">
                    <strong>Publish Date</strong>
                </div>
                <div class="col s2">
                    <strong>Expiry Date</strong>
                </div>
                <div class="col s3"></div>
            </div>
            <!-- HEADING END -->

            <div id="notices">
                <!--Notices will show here-->
                
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
    <script src="../assets/js/admin-notice-view.js"></script>
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
            $('.sidenav').sidenav();
        });
    </script>
</body>

</html>