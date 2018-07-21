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
        <form method="POST" name="frm">
            <h4>Institute Features</h4>
            <hr><br>

            <div class="input-field">
                <input type="number" id="num_cmp" name="num_cmp" min="0" required> 
                <label class="active" for="num_cmp">Institute Total Number of Computers</label>
            </div>

            <div class="input-field">
                <input type="number" id="num_cmplab" name="num_cmplab" min="0"  required>
                <label class="active" for="num_cmplab">Institute Total Number of Computer Lab</label>
            </div>

            <div class="input-field">
                <input type="number" id="min_num_cmp" name="min_num_cmp" min="0"  required>
                <label class="active" for="min_num_cmp">Minimum Number of Computers in a Lab</label>
            </div>

            <div class="input-field">
                <input type="number" id="ispeed" name="ispeed" required min="0">
                <label class="active" for="ispeed">Institute Internet Speed (calculated only in Kbps)</label>
            </div>

            <div class="input-field">
                <input type="number" id="hall_cap" name="hall_cap" required min="0" >
                <label class="active" for="hall_cap">Institute Total Hall Capacity</label>
            </div>

            <div class="input-field">
                <input type="number" id="num_cctv" name="num_cctv" required min="0" >
                <label class="active" for="num_cctv">Institute Total CCTV Camera in LAB</label>
            </div>

            <div class="row">
                <div class="col s3" style="color: #9E9E9E;">Institute Has Optical Fiber LAN: </div>

                <div class="col s9">
                    <input class="with-gap" name="has_fiber" type="radio" id="has_fiber1" value="yes" required>
                    <label for="has_fiber1">Yes</label>
                    <input class="with-gap" name="has_fiber" type="radio" id="has_fiber2" value="no">
                    <label for="has_fiber2">No</label>
                </div>
            </div>

            <button class="btn btn-large red left" type="reset">Reset</button>
            <button class="btn btn-large green right" type="submit" onclick="clicked()">Submit & Continue</button>

            <div class="clearfix"></div>
        </form>
    </div>

    <?php
        include("./page-part/footer.php");
    ?>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>