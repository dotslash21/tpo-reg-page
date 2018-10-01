<?php 
    if(isset($_GET['fallback'])){
        if($_GET['fallback'] == 'yes'){
            $fallback= "You need to fill up the whole form first!";
        }
    }
    else{
        $fallback = '';
    }

    require '../inc/func.php';
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

    <meta name="token" content="<?php session_start(); echo XCSRF::mkcsrf('inst-frm1');?>">

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
        <h4>Institute Details</h4>
        <hr>
        <br>
        <div class="card">
            <div class="card-content">
                <form class="frm" id="frm">
                    <div id="msg_box" class="center-align">
                        <span class="red-text text-lighten-1"><?php echo $fallback; ?></span>
                    </div>
                    <div class="input-field">
                        <input type="text" id="name" name="name" required>
                        <label class="active" for="name">Institute Name</label>
                    </div>
                    <div class="row">
                        <div class="col s8">
                            <div class="input-field">
                                <input type="number" id="inst_code" name="inst_code" required min="0">
                                <label class="active" for="inst_code">Institute code</label>
                            </div>
                        </div>
                        <div class="col s4" style="line-height:40px; margin-top: 10px; margin-button: 10px;">
                            <div class="grey lighten-4" style="border-radius: 8px; text-align: center;">
                                <span class="err-inst_code" style="">&nbsp;</span>
                            </div>
                        </div>
                    </div>
		    	    <div class="row">
                        <div class="col s8">
                            <div class="input-field">
                                <input type="text" id="uid" name="uid" required>
                                <label class="active" for="uid">Institute User ID</label>
                            </div>
                        </div>
                        <div class="col s4" style="line-height:40px; margin-top: 10px; margin-button: 10px;">
                            <div class="grey lighten-4" style="border-radius: 8px; text-align: center;">
                                <span class="err-uid" style="">&nbsp;</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="password" id="password" name="password" required class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Must be of atleast 8 characters long">
                                <label class="active" for="password">Password</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="estd" name="estd" min="1800" class="validate" required>
                                <label class="active" for="estd">Institute Establishment Year</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <select name="accrd" id="accrd" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="NAAC-A+">NAAC-A+</option>
                                    <option value="NAAC-A">NAAC-A</option>
                                    <option value="NAAC-B">NAAC-B</option>
                                    <option value="NAAC-C">NAAC-C</option>
                                    <option value="NAAC-D">NAAC-D</option>
                                </select>
                                <label>Institute Accriditated By</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <select name="inst_type" id="inst_type" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="Government">Government</option>
                                    <option value="Government-Aided">Government-Aided</option>
                                    <option value="Self-Financed">Self-Financed</option>
                                </select>
                                <label>Institute Type</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <select name="affli" id="affli" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="Maulana Kalam Azad University of Technology">Maulana Kalam Azad University of Technology</option>
                                    <option value="Calcutta University">Calcutta University</option>
                                    <option value="Jadavpur University">Jadavpur University</option>
                                    <option value="University of Kalyani">University of Kalyani</option>
                                </select>
                                <label>Institute Affiliated By</label>
                            </div>
                        </div>
                        <div class="col s6">
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
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="pin" name="pin" pattern="\d{6}" min="0" required>
                                <label for="pin" class="active">Institute PIN</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <select name="inst_state" id="inst_state" required>
                                    <?php include('../inc/inst_state.php'); ?>
                                </select>
                                <label>Institute State</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field" id="district_txt">
                                <input type="text" id="ins_dst_txt" name="ins_dst" class="">
                                <label class="active" for="ins_dst_txt">Institute District</label>
                            </div>

                            <div class="input-field" id="district_sel">
                                <select id="ins_dst_sel" name="" class="">
                                    <?php include('../inc/inst_dst.php');?>
                                </select>
                                <label for="ins_dst_sel">Institute District</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" id="number" name="number" class="validate" min="0" required>
                                <label for="number" class="active">Institute Contact Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="email" id="email" name="email" class="validate" required>
                                <label class="active" for="email">Institute E-mail</label>
                            </div>
                        </div>
                        <div class="col s6">
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

    <footer class="page-footer blue darken-3">
        <div class="footer-copyright blue darken-4"> 
            <div class="container">
                Copyright &copy; 2018. CPC, West Bengal
                <a class="grey-text text-lighten-4 right" href="./dev.html">Designed at GCETTB</a>
            </div>
        </div>
    </footer>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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