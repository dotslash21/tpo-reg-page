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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

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
        <form class="frm">
            <h4>Institute Head Details</h4>
            <hr><br>

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
            
            <h4>Institute TPO Details</h4>
            <hr><br>

            <div class="input-field">
                <input type="text" id="tpo_name" name="tpo_name" required>
                <label class="active" for="tpo_name">Institute TPO Name</label>
            </div>

            <div class="input-field">
                <input type="number" id="tpo_contact1" name="tpo_contact1" pattern="[6-9]{1}[0-9]{9}" required>
                <label class="active" for="tpo_contact1">Institute TPO Contact Number-1</label>
            </div>

            <div class="input-field">
                <input type="number" id="tpo_contact2" name="tpo_contact2">
                <label class="active" for="tpo_contact2">Institute TPO Contact Number-2</label>
            </div>

            <div class="input-field">
                <input type="email" id="tpo_email" name="tpo_email" class="validate" required>
                <label class="active" for="tpo_email">Institute TPO Email Id</label>
            </div>

            <button class="btn btn-large yellow left" name="back" id="back">Back</button>
            <button class="btn btn-large green right" type="submit" name="submit" id="submit">Submit &amp; Continue</button>

            <div class="clearfix"></div>
        </form>
    </div>

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