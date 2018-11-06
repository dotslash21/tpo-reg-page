<?php 
    if(isset($_GET['fallback'])){
        if($_GET['fallback'] == 'yes'){
            $fallback= "You need to fill up the whole form first!";
        }
    }
    else{
        $fallback = '';
    }
    define('_incFuncwwrfbhdjrt',true);
    require '../inc2357v3cn425073p4y53w79/func.php';

    setFormCookie('_form1');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta name="token" content="<?php echo XCSRF::mkcsrf('inst-frm1');?>">

    <style>
        #form-container {
            padding: 2em 0.5em 2em 0.5em;
            margin-top: -1em;
            margin-bottom: 2em;
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

    <!-- MAIN FORM BODY-->
    <div class="container" id="form-container">
        <h4>Institute Registration</h4>
        <hr>
        <ul class="pagination center">
            <li class="active"><a href="javascript: void(0)">Form 1</a></li>
            <li class="waves-effect"><a href="javascript: void(0)">Form 2</a></li>
            <li class="waves-effect"><a href="javascript: void(0)">Form 3</a></li>
            <li class="waves-effect"><a href="javascript: void(0)">Form 4</a></li>
            <li class="waves-effect"><a href="javascript: void(0)">Confirmation</a></li>
        </ul>
        <div class="card">
            <div class="card-content">
            <span class="card-title"><h5>Institute Details</h5></span><hr><br>
                <form class="frm" id="frm">
                    <div id="msg_box" class="center-align">
                        <span class="red-text text-lighten-1"><?php echo $fallback; ?></span>
                    </div>
                    <div class="input-field">
                        <input type="text" id="name" name="name" required>
                        <label class="active" for="name">Institute Name</label>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l6">
                            <div class="input-field">
                                <input type="number" id="estd" name="estd" min="1800" class="validate" required>
                                <label class="active" for="estd">Institute Establishment Year</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <div class="input-field">
                                <input type="text" name="accrd" id="accrd">
                                <label>Institute Accredition (Optional)</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l6">
                            <div class="input-field">
                                <select name="inst_type" id="inst_type" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="Government">Government</option>
                                    <option value="Government-Aided">Government-Aided</option>
                                    <option value="Private">Private</option>
                                </select>
                                <label>Institute Type</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <div class="input-field">
                                <input type="text" name="affli" id="affli" required>
                                <label>Institute Affiliation</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l6">
                            <div class="input-field">
                                <select name="inst_appr" id="inst_appr" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="UGC">UGC</option>
                                    <option value="AICTE">AICTE</option>
                                </select>
                                <label>Institute Approved By</label>
                            </div>
                        </div>
                    </div>

                    <div class="input-field">
                        <textarea id="address" class="materialize-textarea" name="address" required></textarea>
                        <label class="active" for="address">Institute Address</label>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <div class="input-field">
                                <input type="number" id="pin" name="pin" pattern="\d{6}" min="0" required>
                                <label for="pin" class="active">Institute PIN</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l6">
                            <div class="input-field">
                                <select name="inst_state" id="inst_state" required>
                                    <?php include('../inc2357v3cn425073p4y53w79/inst_state.php'); ?>
                                </select>
                                <label>Institute State</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <div class="input-field" id="district_txt">
                                <input type="text" id="ins_dst_txt" name="ins_dst" class="">
                                <label class="active" for="ins_dst_txt">Institute District</label>
                            </div>

                            <div class="input-field" id="district_sel">
                                <select id="ins_dst_sel" name="" class="">
                                    <?php include('../inc2357v3cn425073p4y53w79/inst_dst.php');?>
                                </select>
                                <label for="ins_dst_sel">Institute District</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l6">
                            <div class="input-field">
                                <input type="number" id="number" name="number" class="validate" min="0" required>
                                <label for="number" class="active">Institute Contact Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <div class="input-field">
                                <input type="email" id="email" name="email" class="validate" required>
                                <label class="active" for="email">Institute E-mail</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l6">
                            <div class="input-field">
                                <input type="text" id="website" name="website" class="validate" required>
                                <label class="active" for="website">Institute Website</label>
                            </div>
                        </div>
                    </div>
 
                    <button class="btn red left" type="reset">Reset</button>
                    <button class="btn green right" type="submit" name="submit" id="submit">Next</button>

                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
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
    <script src="../assets/js/jquery.cookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="../assets/js/institute_from1.js"></script>
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
        $(document).ready(function(){
            $('#district_txt').show();
            $('#district_sel').hide();

            $('#inst_state').change(function () {
                var selected = $('#inst_state option:selected').text();
                if(selected == 'West Bengal (WB)') {
                    $('#district_txt').hide();
                    $('input#ins_dst_txt').attr("name", "");
                    $('#district_sel').show();
                    $('#ins_dst_sel').attr("name", "ins_dst");

                }
                else {
                    $('#district_txt').show();
                    $('input#ins_dst_txt').attr("name", "ins_dst");
                    $('#district_sel').hide();
                    $('#ins_dst_sel').attr("name", "");
                }
            });
        });
    </script>
</body>

</html>
