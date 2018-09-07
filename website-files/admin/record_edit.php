<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('Location: ./login.php?lf=yes');
        exit;
    }
    define("_CON_",true);
    require("../inc/db-con.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $inst_code = $_GET['inst_code_edit'];

        $sql_data = "SELECT * FROM cred WHERE inst_code = '".$inst_code."' LIMIT 1";
        $result_data = mysqli_query($con, $sql_data);
        $result_array = mysqli_fetch_array($result_data);
    }
    else{
        header('Location: ./colege_details.php');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>ADMIN RECORD EDIT</title>
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
            <a href="" class="brand-logo center">ADMIN RECORD EDIT</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="./dashboard.php">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="./logout.php">Log Out</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="./dashboard.php">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="./logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <!-- MAIN FORM BODY-->
    <div class="container z-depth-1" id="form-container">
        <form class="frm">
            <h4>Institute Details</h4>
            <hr>
            <br>
            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="text" id="name" name="name" required  disabled value="XXXXX">
                        <label class="active" for="name">Institute Name</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="inst_code" name="inst_code" required min="0"  disabled value="123">
                        <label class="active" for="inst_code">Institute code</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="text" id="uid" name="uid" required disabled value="XXXXX">
                        <label class="active" for="uid">Institute User ID</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="password" id="password" name="password" required disabled>
                        <label class="active" for="password">Password</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="estd" name="estd" min="1800" class="validate" required>
                        <label class="active" for="estd">Institute Establishment Year</label>
                    </div>
                </div>
                <div class="col l6 s12">
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
            </div>
            <div class="row">
                <div class="col l6 s12">
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
                <div class="col l6 s12">
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
            </div>
            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <select name="inst_appr" id="inst_appr" required>
                            <option value="" disabled selected>Choose your option</option>
                            <option value="UGC">UGC</option>
                            <option value="AICTE">AICTE</option>
                        </select>
                        <label>Institute Approved By</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    
                </div>
            </div>
            <div class="input-field">
                <textarea id="address" class="materialize-textarea" name="address" required></textarea>
                <label class="active" for="address">Institute Address</label>
            </div>
            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="pin" name="pin" pattern="\d{6}" min="0" required>
                        <label for="pin" class="active">Institute PIN</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <select name="inst_state" id="inst_state" required>
                            <?php 
                        $a=['Andaman and Nicobar Islands(AN)', 'Andhra Pradesh (AP)', 'Arunachal Pradesh (AR)', 
                            'Assam (AS)', 'Bihar (BR)', 'Chandigarh (CH)', 'Chhattisgarh (CG)', 
                            'Dadra and Nagar Haveli (DN)', 'Daman and Diu (DD)', 'Goa (GA)', 'Gujarat (GJ)', 
                            'Haryana (HR)', 'Himachal Pradesh (HP)', 'Jammu and Kashmir (JK)', 'Jharkhand (JH)', 
                            'Karnataka (KA)', 'Kerala (KL)', 'Lakshadweep (LD)', 'Madhya Pradesh (MP)', 
                            'Maharashtra (MH)', 'Manipur (MN)', 'Meghalaya (ML)', 'Mizoram (MZ)', 'Nagaland (NL)', 
                            'National Capital Territory of Delhi (DL)', 'Odisha(OR)', 'Pondicherry (PY)', 
                            'Punjab (PB)', 'Rajasthan (RJ)', 'Sikkim (SK)', 'Tamil Nadu (TN)', 'Telangana (TS)', 
                            'Tripura (TR)', 'Uttar Pradesh (UP)', 'Uttarakhand (UK)', 'West Bengal (WB)'];
                        for( $i = 0; $i<count($a);$i++ ){
                            echo "<option value='$a[$i]'>$a[$i]</option>";};?>
                        </select>
                        <label>Institute State</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field" id="district_txt">
                        <input type="text" id="ins_dst_txt" name="ins_dst" class="">
                        <label class="active" for="ins_dst_txt">Institute District</label>
                    </div>
                    <div class="input-field" id="district_sel">
                        <select id="ins_dst_sel" name="" class="">
                            <?php include('../institute/inst_dst.php');?>
                        </select>
                        <label for="ins_dst_sel">Institute District</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="number" name="number" class="validate" min="0" required>
                        <label for="number" class="active">Institute Contact Number</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="email" id="email" name="email" class="validate" required>
                        <label class="active" for="email">Institute E-mail</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="url" id="website" name="website" class="validate" required>
                        <label class="active" for="website">Institute Website</label>
                    </div>
                </div>
            </div>

            <h4>Institute Head Details</h4>
            <hr>
            <br>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="text" id="head_name" name="head_name" required>
                        <label class="active" for="head_name">Institute Head Name</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="text" id="head_desg" name="head_desg" required>
                        <label class="active" for="head_desg">Institute Head Designation</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="head_mob" name="head_mob" pattern="[6-9]{1}[0-9]{9}" required>
                        <label class="active" for="head_mob">Institute Head Contact(Mobile)</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="head_ph" name="head_ph" required>
                        <label class="active" for="head_ph">Institute Head Contact(Land Line)</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="email" id="head_email" name="head_email" class="validate" required>
                        <label class="active" for="head_email">Institute Head Contact Email Id</label>
                    </div>
                </div>
                <div class="col l6 s12">

                </div>
            </div>

            <h4>Institute TPO Details</h4>
            <hr>
            <br>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="text" id="tpo_name" name="tpo_name" required>
                        <label class="active" for="tpo_name">Institute TPO Name</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="tpo_contact1" name="tpo_contact1" pattern="[6-9]{1}[0-9]{9}" required>
                        <label class="active" for="tpo_contact1">Institute TPO Contact Number-1</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="tpo_contact2" name="tpo_contact2">
                        <label class="active" for="tpo_contact2">Institute TPO Contact Number-2</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="email" id="tpo_email" name="tpo_email" class="validate" required>
                        <label class="active" for="tpo_email">Institute TPO Email Id</label>
                    </div>
                </div>
            </div>

            <h4>Institute Features</h4>
            <hr>
            <br>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="num_cmp" name="num_cmp" min="0" required>
                        <label class="active" for="num_cmp">Institute Total Number of Computers</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="num_cmplab" name="num_cmplab" min="0" required>
                        <label class="active" for="num_cmplab">Institute Total Number of Computer Lab</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="min_num_cmp" name="min_num_cmp" min="0" required>
                        <label class="active" for="min_num_cmp">Minimum Number of Computers in a Lab</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="ispeed" name="ispeed" required min="0">
                        <label class="active" for="ispeed">Institute Internet Speed (calculated only in Kbps)</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="hall_cap" name="hall_cap" required min="0">
                        <label class="active" for="hall_cap">Institute Total Hall Capacity</label>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                        <input type="number" id="num_cctv" name="num_cctv" required min="0">
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

            <h4>Course Details</h4>
            <hr>
            <br>
            
            <div id="courses-area">
            
            </div>

            <button class="btn btn-large red left" type="reset">Reset</button>
            <button class="btn btn-large green right" type="submit" name="submit" id="submit">Update &amp; Continue</button>

            <div class="clearfix"></div>
        </form>
    </div>

    <footer class="page-footer blue darken-3">
        <div class="footer-copyright blue darken-4">
            <div class="container">
                Copyright &copy; 2018. CPC, West Bengal
                <a class="grey-text text-lighten-4 right" href="../dev.html">Designed at GCETTB</a>
            </div>
        </div>
    </footer>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="../assets/js/admin_record_edit.js"></script>
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
            $('#district_txt').show();
            $('#district_sel').hide();

            $('#inst_state').change(function () {
                var selected = $('#inst_state option:selected').text();
                if (selected == 'West Bengal (WB)') {
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

    <script>
        $(document).ready(function () {
            var addr =`<?php echo $result_array['address']?>`;
            //Basic Info
            $("input[name='name']").val('<?php echo $result_array['inst_name']?>');
            $("input[name='inst_code']").val('<?php echo $result_array['inst_code']?>');
            $("input[name='uid']").val('<?php echo $result_array['uid']?>');
            $("input[name='password']").val('<?php echo $result_array['pwd']?>');
            $("input[name='estd']").val('<?php echo $result_array['estd']?>');
            $("select[name='accrd']").val('<?php echo $result_array['inst_accrd']?>');
            $("select[name='inst_type']").val('<?php echo $result_array['inst_type']?>');
            $("select[name='affli']").val('<?php echo $result_array['inst_affl']?>');
            $("select[name='inst_appr']").val('<?php echo $result_array['inst_aprv']?>');
            $("textarea[name='address']").val(addr);
            $("input[name='pin']").val('<?php echo $result_array['pin']?>');
            $("select[name='inst_state']").val('<?php echo $result_array['state']?>');
            $("[name='ins_dst']").val('<?php echo $result_array['district']?>');
            $("input[name='number']").val('<?php echo $result_array['phone']?>');
            $("input[name='email']").val('<?php echo $result_array['email']?>');
            $("input[name='website']").val('<?php echo $result_array['website']?>');

            //Head details
            $("input[name='head_name']").val('<?php echo $result_array['head_name']?>');
            $("input[name='head_desg']").val('<?php echo $result_array['inst_headdesg']?>');
            $("input[name='head_mob']").val('<?php echo $result_array['head_mob']?>');  
            $("input[name='head_ph']").val('<?php echo $result_array['head_contact']?>');
            $("input[name='head_email']").val('<?php echo $result_array['head_email']?>');

            //Tpo Name
            $("input[name='tpo_name']").val('<?php echo $result_array['tpo_name']?>');
            $("input[name='tpo_contact1']").val('<?php echo $result_array['tpo_ph']?>');
            $("input[name='tpo_contact2']").val('<?php echo $result_array['tpo_ph2']?>');
            $("input[name='tpo_email']").val('<?php echo $result_array['tpo_email']?>');

            //Additional Info
            $("input[name='num_cmp']").val('<?php echo $result_array['no_of_comp']?>');
            $("input[name='num_cmplab']").val('<?php echo $result_array['num_cmplab']?>');
            $("input[name='min_num_cmp']").val('<?php echo $result_array['min_num_cmp']?>');
            $("input[name='ispeed']").val('<?php echo $result_array['int_speed']?>');
            $("input[name='hall_cap']").val('<?php echo $result_array['hall_cap']?>');
            $("input[name='num_cctv']").val('<?php echo $result_array['cctv_no']?>');
            $("select[name='has_fiber']").val('<?php echo $result_array['fibop_lan']?>');
            var has_fib = $("input[name='has_fiber']");
            if(has_fib.is(':checked') === false) {
                has_fib.filter('[value="<?php echo $result_array['fibop_lan']; ?>"]').prop('checked', true);
            }

            if($("#uid-<?php echo $result_array['inst_code']; ?>").length == 0){
                $.get("../ajax/admin_college_indv_crs.php?inst_code=<?php echo $result_array['inst_code']; ?>", function(data){
                    $("#courses-area").append(data.value);
                }, "json")
            }
        })
    </script>
</body>

</html>