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
        <div class="nav-wrapper blue darken-3 z-depth-1-half">
            <a href="" class="brand-logo center">TPO Registration Form</a>
        </div>
    </nav>

    <!-- MAIN FORM BODY-->
    <div class="container" id="form-container">
        <form class="frm">
            <h4>Institute Features</h4>
            <hr><br>
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="num_cmp" name="num_cmp" min="0" required> 
                                <label class="active" for="num_cmp">Institute Total Number of Computers</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="num_cmplab" name="num_cmplab" min="0"  required>
                                <label class="active" for="num_cmplab">Institute Total Number of Computer Lab</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="min_num_cmp" name="min_num_cmp" min="0"  required>
                                <label class="active" for="min_num_cmp">Minimum Number of Computers in a Lab</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="ispeed" name="ispeed" required min="0">
                                <label class="active" for="ispeed">Institute Internet Speed (calculated only in Kbps)</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="hall_cap" name="hall_cap" required min="0" >
                                <label class="active" for="hall_cap">Institute Total Hall Capacity</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="num_cctv" name="num_cctv" required min="0" >
                                <label class="active" for="num_cctv">Institute Total CCTV Camera in LAB</label>
                            </div>
                        </div>
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
    <script src="../assets/js/institute_from3.js"></script>
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