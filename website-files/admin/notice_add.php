<?php
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ./login.php?lf=yes');
        exit;
    }

    require '../inc/func.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Notice Add | Admin Panel</title>
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

        .admin-button {
            margin: 0.2em;
        }

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        a {
            color: inherit;
        }
    </style>
</head>

<body>
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-wrapper blue darken-3 z-depth-1-half">
            <a href="#!" class="brand-logo center">NOTICE PANEL</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="./notice_panel.php">Back</a>
                </li>
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="./logout.php">Log Out</a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li>
                    <a href="./dashboard.php">Dashboard</a>
                </li>
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
        <div class="container" id="form-container">
            <div class="card">
                <div class="card-content">
                    <form id="notice-form">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="notice_title" type="text" class="validate" name="notice_title" required>
                                <label for="notice_title">Notice Title</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="notice_desc" class="materialize-textarea" name="notice_desc" required></textarea>
                                <label class="active" for="notice_desc">Notice Description</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" class="datepicker" id="validity" name="validity">
                                <label for="validity">Notice Validity</label>
                            </div>
                        </div>
                        <input style="display: none;" type="text" name="X-CSRF" value="<?php echo XCSRF::mkcsrf('ad-nt-add'); ?>">
                        <div class="file-field input-field">
                            <div class="btn blue darken-3">
                                <span>Attach File</span>
                                <input type="file" name="uploadfile" id="uploadfile">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="No file chosen!">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s10 center-align">
                                <div class="error" style="color: #ff0000;"></div>
                                <div class="message" style="color: rgb(97, 226, 21);"></div>
                                <div class="message2" style="color: rgb(97, 226, 21);"></div>
                            </div>
                            <div class="col s2">
                                <button type="submit" name="submit" class="btn green right" id="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
    <script src="../assets/js/admin-notice-add.js"></script>
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
            $('.sidenav').sidenav();
        });
    </script>
    <script>
        // Get current date
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();


        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            formatSubmit: 'dd-mm-yyyy',
            hiddenName: true,
            closeOnSelect: false, // Close upon selecting a date,
            container: undefined, // ex. 'body' will append picker to body
            min: new Date(yyyy, mm, dd), // Date validation
        });
    </script>
</body>

</html>