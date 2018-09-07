<?php
    define("_CON_",true);
    require("../inc/db-con.php");
?>


<!DOCTYPE html>
<html>

<head>
    <title>CPC TPO Registration</title>
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
            <a href="" class="brand-logo center">TPO Registration Form</a>
        </div>
    </nav>

    <main>
        <!-- MAIN FORM BODY-->
    <div class="container z-depth-3" id="form-container">
        <h3>Course Addition</h3>
        <hr><br>
        <form> 
        <div class="input-field" id="course_sel">
            <select multiple name="courses" id="courses_select">
                <option value="" disabled selected>Choose your option</option>
                <?php
                    $sql_degree = "SELECT DISTINCT degree FROM course_list";
                    $result_degree = mysqli_query($con, $sql_degree);
                    while ($array_degree = mysqli_fetch_array($result_degree)) {
                ?>
                <optgroup label="<?php echo $array_degree['degree']; ?>">
                    <?php
                        $sql_opt = "SELECT course_name FROM course_list WHERE degree =\"" . $array_degree['degree'] . "\"";
                        $result_course = mysqli_query($con, $sql_opt);
                        while ($array_course = mysqli_fetch_array($result_course)) {
                    ?>
                        <option value="<?php echo $array_degree['degree'] . " - " . $array_course['course_name']; ?>"><?php echo $array_degree['degree'] . " - " . $array_course['course_name']; ?></option> -->

                <?php
                        }
                    }
                ?>

            </select>
            <label>Select Institute Courses</label>
        </div>
            
            <div id="button-panel">
                <div class="btn btn-large blue lighten-2 left" id="back">Back</div>
                <div class="btn btn-large yellow darken-4 right" id="lock">Lock Choices</div>
                <div class="clearfix"></div>
            </div>
        </form>
        <br><br>
        <form id="course_form">
            <!-- jQuery GENERATED -->
        </form>
    </div>
    </main>

    <footer class="page-footer blue darken-3">
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
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
        $('select').material_select('destroy');
    </script>
<script src="../assets/js/institute-course-select.js"></script>
</body>

</html>
