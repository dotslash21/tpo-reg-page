<?php
    session_start();
    if(!isset($_SESSION['inst_code'])){
        header('Location: ./form.php?fallback=yes');
        exit;
    }
    define('_incFuncwwrfbhdjrt',true);
    require '../inc2357v3cn425073p4y53w79/func.php';
?>

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

        #form-div {
            border-right: 1px solid rgba(0,0,0,0.35);
        }
    </style>
</head>

<body class="grey lighten-3">
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-wrapper blue darken-2 z-depth-1-half">
            <div class="brand-logo"><img src="../assets/images/bannerb6434bb3.png" alt="Logo"></div>
        </div>
    </nav>

    <main>
        <div class="container" id="form-container">
            <h3>File Input</h3>
            <hr>
            <div class="card">
                <div class="card-content">
                    <p>PDF and JPG, Less than 2MB</p><br>
                    <!-- File Input Section -->
                    <div class="row">
                        <div class="col s6" id="form-div">
                        <form id="file_upload">
                            <div class="file-field input-field">
                                <div class="btn waves-effect waves-light btn-small blue darken-3">
                                <span>Choose File</span>
                                <input type="file" name="uploadfile" id="uploadfile">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="No file chosen!">
                            </div>
                        </div>
                        <input style="display: none;" type="text" name="X-CSRF" value="<?php echo XCSRF::mkcsrf('inst-fl-up'); ?>">
                        <button type="submit" name="submit" class="btn waves-effect waves-light green right" id="submit">Upload File</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="col s6">
                    <div class="error" style="color: red;"></div>
                    <div class="message"></div>
                    <div class="message2"></div>
                    <button class="btn waves-effect waves-light green right" name="complete" id="complete">Final Submit 
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <footer class="page-footer blue darken-2" style="padding-top: 10px;">
        <div class="footer-copyright">
            <div class="container">
                Copyright &copy; 2018. CPC, West Bengal
                <a class="grey-text text-lighten-4 right" href="http://gcettb.ac.in/home" target="_blank">Developed at GCETTB</a>
            </div>
        </div>
    </footer>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="../assets/js/institute_fileUpload.js"></script>
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