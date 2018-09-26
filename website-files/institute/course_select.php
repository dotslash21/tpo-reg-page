<?php
    session_start();
    $token = md5(rand());
    $_SESSION['token'] = $token;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>CPC TPO Registration</title>
    <meta charset="utf-8" />
    <meta name="token" content = "<?php echo $token; ?>">
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
        <div class="nav-wrapper blue darken-3 z-depth-1-half">
            <a href="" class="brand-logo center">TPO Registration Form</a>
        </div>
    </nav>

    <main>
        <!-- MAIN FORM BODY-->
    <div class="container" id="form-container">
        <h4>Course Addition</h4>
        <hr>
        <div class="card">
            <div class="card-content">
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

    <footer class="page-footer blue darken-4">
        <div class="footer-copyright blue darken-4">
            <div class="container">
                Copyright © 2018. CPC, West Bengal
                <a class="grey-text text-lighten-4 right" href="./dev.html">Designed at GCETTB</a>
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
