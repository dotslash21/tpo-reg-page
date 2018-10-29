<?php

    define('_incFuncwwrfbhdjrt',true);
    require '../inc2357v3cn425073p4y53w79/func.php';

    if(admin::loginPageCheck()){
        header('Location: ./dashboard.php');
    }

    if(isset($_GET['lf'])){
        if($_GET['lf'] == 'yes'){
            $logfail= "You need to Log In first";
        }
    }
    else if(isset($_GET['fallback'])){
        if($_GET['fallback'] == 'yes'){
            $logfail= "You have logged off successfully!";
        }
    }
    else{
        $logfail = '&nbsp;';
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

    <!-- reCAPTCHA includes -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="X-CSRF" content="<?php echo XCSRF::mkcsrf('ad')?>">

    <style>
        #form-container {
            padding: 2em 0.5em 2em 0.5em;
            margin-top: -1em;
            margin-bottom: 2em;
        }
        
        @media (min-width: 768px) {
            #form-container {
                width: 40vw;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
            #form-container {
                width: 40vw;
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
        .text-xs-center {
        text-align: center;
        }

        .g-recaptcha {
            display: inline-block;
        }

        nav .nav-wrapper .brand-logo img {
            height: 2em;
        }

        @media (min-width: 768px) {
            nav .nav-wrapper .brand-logo img {
                padding-left: 2em;
                height: 2em;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
                nav .nav-wrapper .brand-logo img {
                padding-left: 2em;
                height: 2em;
            }
        }

        @media (min-width: 481px) and (max-width: 767px) {
                nav .nav-wrapper .brand-logo img {
                height: 2em;
            }
        }

        @media (min-width: 320px) and (max-width: 480px) {
                nav .nav-wrapper .brand-logo img {
                height: 2em;
            }
        }
    </style>
</head>

<body class="grey lighten-4">
    <!-- NAVIGATION -->
    <nav>
    <div class="nav-wrapper blue darken-2 z-depth-1-half">
    <div class="brand-logo"><img src="../assets/images/bannerb6434bb3.png" alt="Logo"></div>
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
            <h4 style="border-left: 4px solid #616161; padding-left: 8px;" class="grey-text text-darken-2">Admin Login</h4>
            <div class="card">
                <div class="card-content">
                <br>
                <div id="msg_box" class="center-align">
                    <span class="red-text text-lighten-1" id="logfail"><?php echo $logfail; ?></span>
                </div>
                <br>
                    <form id="admin-login">
                        <div class="input-field">
                            <input type="text" id="admin_id" name="admin_id">
                            <label class="active" for="admin_id">User ID</label>
                        </div>
                        <div class="input-field">
                            <input type="password" id="admin_passwd" name="admin_password">
                            <label class="active" for="admin_passwd">Password</label>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="text-xs-center">
                                    <!-- reCaptcha -->
                                    <div class="g-recaptcha" data-sitekey="6LeehWIUAAAAAE5afLzfG1lGgM7LpeFXQKlu_kMa"></div>
                                </div>
                            </div>
                        </div>

                        <div class="left">
                            <a href="">Forgot Password</a>
                        </div>
                        <button class="btn green right" type="submit" name="submit" id="submit">LOGIN</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="page-footer blue darken-2" style="padding-top: 10px;">
        <div class="footer-copyright">
            <div class="container">
                Copyright &copy; <?php echo date('Y')?>. CPC, West Bengal
                <a class="grey-text text-lighten-4 right" href="../dev.html" target="_blank">Developed at GCETTB</a>
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
    </script>
</body>

</html>