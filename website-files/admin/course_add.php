<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('Location: ./login.php?lf=yes');
        exit;
    }
    define("_CON_",true);
    include("../inc/db-con.php");
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
                <li><a href="./dashboard.php">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="./logout.php">Log Out</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="./dashboard.php">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="./logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <!-- MAIN FORM BODY-->
    <main>
        <div class="container z-depth-3" id="form-container">
            <div>
                <h3 class="center-align">Course Addition</h3>
                <hr>
                <br>
            </div>
            <form class="add-frm">
                <div class="input-field" id="old_degree">
                    <select name="degree" id="old_degree_input">
                        <option value="" disabled selected>Choose your option</option>
                        <?php 
                            $sql_admin = "SELECT DISTINCT degree FROM `course_list`";
                            $result_admin = mysqli_query($con,$sql_admin);
                            while ($array_admin=mysqli_fetch_array($result_admin)) {
                        ?>
                        <option value="<?php echo $array_admin['degree']; ?>"><?php echo $array_admin['degree']; ?></option>
                        <?php
                            }
                        ?>
                        <option value="Other">Other</option>

                    </select>
                    <label>Choose the degree</label>
                </div>

                <div class="input-field" id="new_degree">
                    <input type="text" id="new_degree_input" name="degree_new" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="GIVE DEGREE NAME AS B.Tech, M.Tech, MCA, BCA, etc.">
                    <label class="active" for="new_degree_input">Enter new degree name</label>
                </div>

                <div class="input-field">
                    <input type="text" id="course" name="course" required class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="GIVE FULL NAME OF THE COURSE IN UPPERCASE" pattern="[A-Z\s]+">
                    <label class="active" for="course">Enter the corresponding course</label>
                </div>
                
                <div class="row">
                    <div class="col s10 center-align" >
                        <div id="result"></div>
                    </div>
                    <div class="col s2"><button type="submit" class="btn green">Submit</button></div>
                </div>
            </form>
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
    <script src="../assets/js/admin_course_add.js"></script>
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