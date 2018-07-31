<?php
    include("../inc/db-con.php");
    session_start();
    if(!isset($_SESSION['admin_id'])){
        echo "You need to fill the whole form";
        exit;
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $degree= $_POST['degree'];
        $course= $_POST['course'];

        $sql_admin_add = "INSERT INTO course_list(degree,course_name) VALUE('" .$degree ."','". $course. "')";
        mysqli_query($con,$sql_admin_add);  
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
            <a href="dashboard.php" class="brand-logo center">ADMIN PANEL</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
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
            <div>
                <h3 class="center-align">Course Addition</h3>
                <hr>
                <br>
            </div>
            <form action="course_add.php" method="post">
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
                    <input type="text" id="new_degree_input" name="degree_new">
                    <label class="active" for="new_degree_input">Enter new degree name</label>
                </div>

                <div class="input-field">
                    <input type="text" id="course" name="course">
                    <label class="active" for="course">Enter the corresponding course</label>
                </div>

                <button type="submit" class="btn btn-large green right">Submit</button>
                <div class="clearfix"></div>
            </form>
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
            $('#new_degree').hide();

            $('#old_degree_input').change(function () {
                var selected = $('#old_degree_input option:selected').text();
                if (selected == 'Other') {
                    $('#old_degree_input').attr("name", "degree_old");
                    $('#new_degree').show();
                    $('#new_degree_input').attr("name", "degree");
                }
                else {
                    $('#old_degree_input').attr("name", "degree");
                    $('#new_degree').hide();
                    $('#new_degree_input').attr("name", "degree_new");
                }
            });
        });
    </script>
</body>

</html>