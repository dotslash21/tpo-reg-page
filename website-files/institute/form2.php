<!DOCTYPE html>
<html lang="en">
<head>
    <title>CPC TPO Registration</title>
    <meta charset="utf-8" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>
        #form-container {
            padding: 2em 0.5em 2em 0.5em;
            margin-top: -1em;
            margin-bottom: 2em;
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

    <!-- MAIN FORM BODY-->
    <div class="container" id="form-container">
        <form class="frm">
            <h4>Institute Registration</h4>
            <hr>
            <ul class="pagination center">
                <li class="waves-effect"><a href="./form1.php">Form 1</a></li>
                <li class="active"><a href="javascript : void(0)">Form 2</a></li>
                <li class="waves-effect"><a href="./form3.php">Form 3</a></li>
                <li class="waves-effect"><a href="./course_select.php">Form 4</a></li>
                <li class="waves-effect"><a href="./summary.php">Summary</a></li>
            </ul>
            <div class="card">
                <div class="card-content">
                <span class="card-title"><h5>Institute Head Details</h5></span><hr><br>
                    <div class="input-field">
                        <input type="text" id="head_name" name="head_name" required>
                        <label class="active" for="head_name">Institute Head Name</label>
                    </div>

                    <div class="input-field">
                        <input type="text" id="head_desg" name="head_desg" required>
                        <label class="active" for="head_desg">Institute Head Designation</label>
                    </div>

                    <div class="input-field">
                        <input type="number" id="head_mob" name="head_mob" pattern="[6-9]{1}[0-9]{9}" required>
                        <label class="active" for="head_mob">Institute Head Contact(Mobile)</label>
                    </div>

                    <div class="input-field">
                        <input type="number" id="head_ph" name="head_ph" required>
                        <label class="active" for="head_ph">Institute Head Contact(Land Line)</label>
                    </div>

                    <div class="input-field">
                        <input type="email" id="head_email" name="head_email" class="validate" required>
                        <label class="active" for="head_email">Institute Head Contact Email Id</label>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                <span class="card-title"><h5>Institute TPO Details</h5></span><hr><br>
                    <div class="input-field">
                        <input type="text" id="tpo_name" name="tpo_name" required>
                        <label class="active" for="tpo_name">Institute TPO Name</label>
                    </div>

                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="tpo_contact1" name="tpo_contact1" pattern="[6-9]{1}[0-9]{9}" required>
                                <label class="active" for="tpo_contact1">Institute TPO Contact Number-1</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="tpo_contact2" name="tpo_contact2">
                                <label class="active" for="tpo_contact2">Institute TPO Contact Number-2</label>
                            </div>
                        </div>
                    </div>

                    <div class="input-field">
                        <input type="email" id="tpo_email" name="tpo_email" class="validate" required>
                        <label class="active" for="tpo_email">Institute TPO Email Id</label>
                    </div>
                </div>
            </div>

            <button class="btn blue lighten-2 left" name="back" id="back">Back</button>
            <button class="btn green right" type="submit" name="submit" id="submit">Next</button>

            <div class="clearfix"></div>
        </form>
    </div>

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
    <script src="../assets/js/institute_from2.js"></script>
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