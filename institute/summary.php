<?php
    define('_incFuncwwrfbhdjrt',true);
    require '../inc2357v3cn425073p4y53w79/func.php';

    print_r($_SESSION);
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
    <meta name="X-CSRF" content="<?php echo XCSRF::mkcsrf('1d'); ?>"> 

    <!-- reCAPTCHA includes -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        #form-container {
            padding: 2em 0.5em 2em 0.5em;
            margin-top: -1em;
            margin-bottom: 2em;
        }

        .text-xs-center {
        text-align: center;
        }

        .g-recaptcha {
            display: inline-block;
        }

        nav .nav-wrapper .brand-logo img {
            height: 2em;
        }

        @media (min-width: 768px) {
            nav .nav-wrapper .brand-logo img {
                padding-left: 2em;
                height: 2em;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
                nav .nav-wrapper .brand-logo img {
                padding-left: 2em;
                height: 2em;
            }
        }

        @media (min-width: 481px) and (max-width: 767px) {
                nav .nav-wrapper .brand-logo img {
                height: 2em;
            }
        }

        @media (min-width: 320px) and (max-width: 480px) {
                nav .nav-wrapper .brand-logo img {
                height: 2em;
            }
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

    <main>
        <div class="container" id="form-container">
            <h4>Institute Registration</h4>
            <hr>
            <ul class="pagination center">
                <li class="waves-effect"><a href="javascript: void(0)">Form 1</a></li>
                <li class="waves-effect"><a href="javascript: void(0)">Form 2</a></li>
                <li class="waves-effect"><a href="javascript: void(0)">Form 3</a></li>
                <li class="waves-effect"><a href="javascript: void(0)">Form 4</a></li>
                <li class="active"><a href=".javascript: void(0)">Confirmation</a></li>
            </ul>
            <h5>Summary</h5>
            <form id="js-register">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><h5>Institute Details</h5></span><hr>
                    <div class="input-field">
                        <input type="text" id="name" name="name" required disabled value="I am not editable">
                        <label for="name">Institute Name</label>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="password" id="password" name="password" required disabled value="I am not editable">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="estd" name="estd" required disabled value="1980">
                                <label for="estd">Institute Establishment Year</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="text" id="accrd" name="accrd" required disabled value="I am not editable">
                                <label for="accrd">Institute Accriditated By</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="text" id="inst_type" name="inst_type" required disabled value="I am not editable">
                                <label for="inst_type">Institute Type</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="text" id="affli" name="affli" required disabled value="I am not editable">
                                <label for="affli">Institute Affiliated By</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="text" id="inst_appr" name="inst_appr" required disabled value="I am not editable">
                                <label for="inst_appr">Institute Approved By</label>
                            </div>
                        </div>
                    </div>

                    <div class="input-field">
                        <textarea id="address" class="materialize-textarea" name="address" required disabled>I am not editable</textarea>
                        <label for="address">Institute Address</label>
                    </div>

                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="pin" name="pin" required disabled value="123456">
                                <label for="pin">Institute PIN</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="text" id="inst_state" name="inst_state" required disabled value="I am not editable">
                                <label for="inst_state">Institute State</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="text" id="ins_dst" name="ins_dst" required disabled value="I am not editable">
                                <label for="ins_dst">Institute District</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="number" name="number" required disabled value="1234567890">
                                <label for="number">Institute Contact Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="email" id="email" name="email" required disabled value="I am not editable">
                                <label for="email">Institute E-mail</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="url" id="website" name="website" required disabled value="I am not editable">
                                <label for="website">Institute Website</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br>

            <div class="card">
                <div class="card-content">
                    <span class="card-title"><h5>Institute Head Details</h5></span><hr>
                    <div class="input-field">
                        <input type="text" id="head_name" name="head_name" required disabled value="I am not editable">
                        <label for="head_name">Institute Head Name</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="head_desg" name="head_desg" required disabled value="I am not editable">
                        <label for="head_desg">Institute Head Designation</label>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="url" id="website" name="website" required disabled value="I am not editable">
                                <label for="website">Institute Website</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="head_mob" name="head_mob" required disabled value="1234567890">
                                <label for="head_mob">Institute Head Contact(Mobile)</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        <input type="number" id="head_ph" name="head_ph" required disabled value="1234567890">
                        <label for="head_ph">Institute Head Contact(Land Line)</label>
                    </div>
                    <div class="input-field">
                        <input type="email" id="head_email" name="head_email" required disabled value="I am not editable">
                        <label for="head_email">Institute Head Contact Email Id</label>
                    </div>
                </div>
            </div>
            <br>
            
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><h5>Institute TPO Details</h5></span><hr>
                    <div class="input-field">
                        <input type="text" id="tpo_name" name="tpo_name" required disabled value="I am not editable">
                        <label for="tpo_name">Institute TPO Name</label>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="tpo_contact1" name="tpo_contact1" required disabled value="1234567890">
                                <label for="tpo_contact1">Institute TPO Contact Number-1</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="tpo_contact2" name="tpo_contact2" disabled value="1234567890">
                                <label for="tpo_contact2">Institute TPO Contact Number-2</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        <input type="email" id="tpo_email" name="tpo_email" required disabled value="I am not editable">
                        <label for="tpo_email">Institute TPO Email Id</label>
                    </div>
                </div>
            </div>
            <br>
            
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><h5>Institute Features</h5></span><hr>
                <div class="row">
                    <div class="col s6">
                        <div class="input-field">
                            <input type="number" id="num_cmp" name="num_cmp" required disabled value="123">
                            <label for="num_cmp">Institute Total Number of Computers</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="number" id="num_cmplab" name="num_cmplab" required disabled value="123">
                            <label for="num_cmplab">Institute Total Number of Computer Lab</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s6">
                        <div class="input-field">
                            <input type="number" id="min_num_cmp" name="min_num_cmp" required disabled value="123">
                            <label for="min_num_cmp">Minimum Number of Computers in a Lab</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="number" id="ispeed" name="ispeed" required disabled value="123">
                            <label for="ispeed">Institute Internet Speed (calculated only in Kbps)</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <div class="input-field">
                            <input type="number" id="hall_cap" name="hall_cap" required disabled value="123">
                            <label for="hall_cap">Institute Total Hall Capacity</label>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="input-field">
                            <input type="number" id="num_cctv" name="num_cctv" required disabled value="123">
                            <label for="num_cctv">Institute Total CCTV Camera in LAB</label>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="input-field">
                            <input type="text" id="has_fiber" name="has_fiber" required disabled value="123">
                            <label for="has_fiber">Institute Has Optical Fiber LAN</label>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <br>

            <div class="card">
                <div class="card-content">
                    <span class="card-title"><h5>Courses Offered</h5></span><hr>
                    <ul class="collection" id="course-intake">
                        <!-- COURSES Added dynamically -->
                    </ul>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12">
                    <div class="text-xs-center">
                        <!-- reCaptcha -->
                        <div class="g-recaptcha" data-sitekey="6LeehWIUAAAAAE5afLzfG1lGgM7LpeFXQKlu_kMa"></div>
                    </div>
                </div>
            </div>

                <button class="btn blue lighten-3 left" id="resetbtn">Edit</button>
                <button class="btn red lighten-2 right" type="submit" name="submit" id="submit">Final Submission</button>

            </form>
            <div class="clearfix"></div>
        
        </div>
    </main>

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
    <script src="../assets/js/institute-summary.js"></script>
    <script src="./faker.min.js"></script>
    <script src="./prop.min.js"></script>
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