<?php
session_start();
define("DBHOST","localhost");
define("DBUSERNAME","root");
define("DBPASSWORD","");
define("DB","cpc_tpo");
$con = mysqli_connect(DBHOST,DBUSERNAME,DBPASSWORD,DB);
if($_SERVER['REQUEST_METHOD']=="POST")
{
	
}

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
    </style>
</head>

<body>
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-wrapper blue darken-3 z-depth-1-half">
            <a href="" class="brand-logo center">TPO Registration Form</a>
        </div>
    </nav>

    <!-- MAIN FORM BODY-->
    <div class="container z-depth-3" id="form-container">
        <form action="course_select.php" method="post">
        <div class="input-field">
            <select multiple>
                <option value="" disabled selected>Choose your option</option>
				<optgroup label="M.Tech">
				<?php
				$sql="select * from admin_t where degree=\"M.Tech\"";
				$result = mysqli_query($con,$sql);
				while($data= mysqli_fetch_array($result))
				{
				?>
                    <option name="courses" value="
					<?php
					echo $data['course_name'];
					?>
					"><?php
					echo $data['course_name'];
					?></option>
					<?php
					}
					?>
                </optgroup>
                <optgroup label="M.Tech">
                    <option name="courses" value="mtech|cse">M.Tech CSE</option>
                    <option name="courses" value="mtech|ee">M.Tech EE</option>
                </optgroup>
            </select>
            <label>Select Institute Courses</label>
        </div>
        </form>

        <!-- PHP OUTPUT-->
        <div>
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if ( isset( $_GET['submit'] ) ) {
                        $courses = $_REQUEST['courses'];
                        print_r($courses);
                    }
                }
            ?>
        </div>

    </div>

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
