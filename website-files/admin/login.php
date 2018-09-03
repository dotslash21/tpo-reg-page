<?php
    session_start();
    if(isset($_SESSION["RED"])){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if($_SESSION["RED"] != $_GET["q"]){
                header('Location: ../404.php');
            }
            session_destroy();
            setcookie(session_name(),'',0,'/');
        }
    }
    if(isset($_SESSION['admin_id'])){
        header('Location: ./dashboard.php');
        exit;
    }

    if(isset($_GET['lf'])){
        if($_GET['lf'] == 'yes'){
            $logfail= "You need to Log In first";
        }
    }
    else{
        $logfail = '';
    }
    if(isset($_GET['fallback'])){
        if($_GET['fallback'] == 'yes'){
            $logfail= "You have logged off successfully!";
        }
    }
    else{
        $logfail = '';
    }
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
        
        @media (min-width: 768px) {
            #form-container {
                width: 50vw;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
            #form-container {
                width: 50vw;
            }
        }

        @media (min-width: 481px) and (max-width: 767px) {
            #form-container {
                width: 60vw;
            }
        }

        @media (min-width: 320px) and (max-width: 480px) {
            #form-container {
                width: 70vw;
            }
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
      <a href="#!" class="brand-logo center">ADMIN LOGIN PANEL</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../index.php">Home</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="../index.php">Home</a></li>
      </ul>
    </div>
  </nav>

    <!-- MAIN FORM BODY-->
    <main>
        <div class="container" id="form-container">
            <br>
            <div id="msg_box" class="center-align">
                <span class="red-text text-lighten-1" id="logfail"><?php echo $logfail; ?></span>
            </div>
            <br>
            <form id="admin-login">
                <div class="input-field">
                    <input type="text" id="admin_id" name="admin_id" required>
                    <label class="active" for="admin_id">User ID</label>
                </div>
                <div class="input-field">
                    <input type="password" id="admin_passwd" name="admin_password" required>
                    <label class="active" for="admin_passwd">Password</label>
                </div>
                <br>
                <div class="left">
                    <a href="">Forgot Password</a>
                </div>
                <button class="btn green right" type="submit" name="submit" id="submit">LOGIN</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </main>

    <footer class="page-footer blue darken-3">
        <div class="footer-copyright blue darken-4">
            <div class="container">
                Copyright &copy; 2018. CPC, West Bengal
                <a class="grey-text text-lighten-4 right" href="http://gcettb.ac.in/home">Designed at GCETTB</a>
            </div>
        </div>
    </footer>


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="../assets/js/admin_login.js"></script>
    <script>
        $( document ).ready(function(){
            $(".button-collapse").sideNav();
        })
    </script>
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
        $('select').material_select('destroy');
        console.log("<?php echo $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>");
        console.log("<?php echo $_SERVER['HTTP_REFERER']; ?>");
    </script>
</body>

</html>