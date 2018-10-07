<?php

    session_start();
    define('_incFuncwwrfbhdjrt',true);
    require '../inc2357v3cn425073p4y53w79/func.php';

    setFormCookie("_crsSel");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>CPC TPO Registration</title>
    <meta charset="utf-8" />
    <meta name="token" content = "<?php echo XCSRF::mkcsrf('crs-sel'); ?>">
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

<body class="grey lighten-4">
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-wrapper blue darken-2 z-depth-1-half">
            <div class="brand-logo"><img src="../assets/images/bannerb6434bb3.png" alt="Logo"></div>
        </div>
    </nav>

    <main>
        <!-- MAIN FORM BODY-->
    <div class="container" id="form-container">
        <h4>Institute Registration</h4>
        <hr>
        <ul class="pagination center">
            <li class="waves-effect"><a href="javascript: void(0)">Form 1</a></li>
            <li class="waves-effect"><a href="javascript: void(0)">Form 2</a></li>
            <li class="waves-effect"><a href="javascript: void(0)">Form 3</a></li>
            <li class="active"><a href="javascript: void(0)">Form 4</a></li>
            <li class="waves-effect"><a href="javascript: void(0)">Confirmation</a></li>
        </ul>
        <div class="card">
            <div class="card-content">
                <span class="card-title"><h5>Course Addition</h5></span><hr><br>
                <span class="grey lighten-4" style="padding: 4px; border-radius: 6px;">Please Select All The Courses Affiliated To Your College</span><br><br>
                <form> 
                    <div class="input-field" id="course_sel">
                    <select multiple name="courses" id="courses_select" class="courses_select">
                    <!-- Select field will come dynamically-->
                    </select>
                    <label>Select Institute Courses</label>
                    </div>

                        <div id="button-panel">
                            <div class="btn blue lighten-2 left" id="back">Back</div>
                            <div class="btn yellow darken-4 right" id="lock">Lock Choices</div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                <br><br>
                <form id="course_form">
                    <!-- jQuery GENERATED -->
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
    <script>
        $(".button-collapse").sideNav();
    </script>
<script src="../assets/js/institute-course-select.js"></script>
</body>

</html>
