<?php
session_start();
define("DBHOST","localhost");
define("DBUSERNAME","root");
define("DBPASSWORD","");
define("DB","cpc_tpo");
$con = mysqli_connect(DBHOST,DBUSERNAME,DBPASSWORD,DB);
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $name=$_POST['name'];
	$inst_code=$_POST['inst_code'];
    $uid=$_POST['uid'];
    $password=$_POST['password'];
    $estd=$_POST['estd'];
    $accrd=$_POST['accrd'];
    $inst_type=$_POST['inst_type'];
    $affli=$_POST['affli'];
    $inst_appr=$_POST['inst_appr'];
    $address=$_POST['address'];
    $pin=$_POST['pin'];
    $inst_state=$_POST['inst_state'];
    $ins_dst=$_POST['ins_dst'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    $website=$_POST['website'];
    $head_name=$_POST['head_name'];
    $head_desg=$_POST['head_desg'];
	$head_mob=$_POST['head_mob'];
	$head_ph=$_POST['head_ph'];
	$head_email=$_POST['head_email'];
	$tpo_name=$_POST['tpo_name'];
	$tpo_contact1=$_POST['tpo_contact1'];
	$tpo_contact2=$_POST['tpo_contact2'];
	$tpo_email=$_POST['tpo_email'];
	$num_cmp=$_POST['num_cmp'];
	$num_cmplab=$_POST['num_cmplab'];
	$min_num_cmp=$_POST['min_num_cmp'];
	$ispeed=$_POST['ispeed'];
	$hall_cap=$_POST['hall_cap'];
	$num_cctv=$_POST['num_cctv'];
    $has_fiber=$_POST['has_fiber'];
    $_SESSION['coll_id']=$uid;
	
	$sql = "Insert into cred(inst_name,inst_code,uid,pwd,estd,inst_accrd,inst_type,inst_affl,inst_aprv,state,district,pin,address,phone,email,website,head_name,
	inst_headdesg,head_contact,head_mob,head_email,tpo_name,tpo_ph,tpo_ph2,tpo_email,no_of_comp,num_cmplab,min_num_cmp,int_speed,hall_cap,fibop_lan,cctv_no)values(
	'".$name."','".$inst_code."','".$uid."','".$password."','".$estd."','".$accrd."','".$inst_type."','".$affli."','".$inst_appr."','".$inst_state."','".$ins_dst."',
	'".$pin."','".$address."','".$number."','".$email."','".$website."','".$head_name."','".$head_desg."','".$head_ph."','".$head_mob."','".$head_email."','".$tpo_name."',
	'".$tpo_contact1."','".$tpo_contact2."','".$tpo_email."','".$num_cmp."','".$num_cmplab."','".$min_num_cmp."','".$ispeed."','".$hall_cap."','".$num_cctv."',
	'".$has_fiber."')";
	mysqli_query($con,$sql);
    echo "Successfully Inserted data!";
    header("Location:course_select.php");
}
?>




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
        <form method="POST">
            <div class="input-field">
                <input type="text" id="name" name="name">
                <label class="active" for="name">Institute Name</label>
            </div>
			<div class="input-field">
                <input type="number" id="inst_code" name="inst_code">
                <label class="active" for="inst_code">Institute code</label>
            </div>
            <div class="input-field">
                <input type="text" id="uid" name="uid">
                <label class="active" for="uid">Institute User ID</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password">
                <label class="active" for="password">Password</label>
            </div>
            <div class="input-field">
                <input type="number" id="estd" name="estd" min="1800" class="validate">
                <label class="active" for="estd">Institute Establishment Year</label>
            </div>

            <div class="input-field">
                <select name="accrd">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="NAAC-A+">NAAC-A+</option>
                    <option value="NAAC-A">NAAC-A</option>
                    <option value="NAAC-B">NAAC-B</option>
                    <option value="NAAC-C">NAAC-C</option>
                    <option value="NAAC-D">NAAC-D</option>
                </select>
                <label>Institute Accriditated By</label>
            </div>

            <div class="input-field">
                <select name="inst_type">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="Government">Government</option>
                    <option value="Government-Aided">Government-Aided</option>
                    <option value="Self-Financed">Self-Financed</option>
                </select>
                <label>Institute Type</label>
            </div>

            <div class="input-field">
                <select name="affli">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="MAKAUT">Maulana Kalam Azad University of Technology</option>
                    <option value="CU">Calcutta University</option>
                    <option value="JU">Jadavpur University</option>
                    <option value="KU">University of Kalyani</option>
                </select>
                <label>Institute Affiliated By</label>
            </div>

            <div class="input-field">
                <select name="inst_appr">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">SELECT-1</option>
                    <option value="2">SELECT-2</option>
                    <option value="3">SELECT-3</option>
                </select>
                <label>Institute Approved By</label>
            </div>

            <div class="input-field">
                <textarea id="address" class="materialize-textarea" name="address"></textarea>
                <label class="active" for="address">Institute Address</label>
            </div>

            <div class="input-field">
                <input type="number" id="pin" name="pin" pattern="\d{6}">
                <label for="pin" class="active">Institute PIN</label>
            </div>

            <div class="input-field">
                <select name="inst_state">
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

            <div class="input-field" id="district_txt">
                
            </div>

            <div class="input-field" id="district_sel">
            <select name="ins_dst" id="ins_dst">
				<?php 
					$a=['Alipurduar', 'Bankura', 'Birbhum', 'Cooch Behar', 'Dakshin Dinajpur','Darjeeling', 'Hooghly', 'Howrah', 'Jalpaiguri', 'Jhargram', 
					'Kalimpong','Kolkata','Malda', 'Murshidabad', 'Nadia', 'North 24 Parganas', 'Paschim Bardhaman','Paschim Medinipur', 'Purba Bardhaman',
					 'Purba Medinipur', 'Purulia', 'South 24 Parganas','Uttar Dinajpur'];
				for( $i = 0; $i<count($a);$i++ ){
				echo "<option value='$a[$i]'>$a[$i]</option>";};
				?>
	           </select>
                <label for="ins_dst">Institute District</label>
            </div>

            <div class="input-field">
                <input type="number" id="number" name="number" class="validate">
                <label for="number" class="active">Institute Contact Number</label>
            </div>

            <div class="input-field">
                <input type="email" id="email" name="email" class="validate">
                <label class="active" for="email">Institute E-mail</label>
            </div>

            <div class="input-field">
                <input type="url" id="website" name="website" class="validate">
                <label class="active" for="website">Institute Website</label>
            </div>

            <div class="input-field">
                <input type="text" id="head_name" name="head_name">
                <label class="active" for="head_name">Institute Head Name</label>
            </div>

            <div class="input-field">
                <input type="text" id="head_desg" name="head_desg">
                <label class="active" for="head_desg">Institute Head Designation</label>
            </div>

            <div class="input-field">
                <input type="number" id="head_mob" name="head_mob">
                <label class="active" for="head_mob">Institute Head Contact(Mobile)</label>
            </div>

            <div class="input-field">
                <input type="number" id="head_ph" name="head_ph">
                <label class="active" for="head_ph">Institute Head Contact(Land Line)</label>
            </div>

            <div class="input-field">
                <input type="email" id="head_email" name="head_email" class="validate">
                <label class="active" for="head_email">Institute Head Contact Email Id</label>
            </div>

            <div class="input-field">
                <input type="text" id="tpo_name" name="tpo_name">
                <label class="active" for="tpo_name">Institute TPO Name</label>
            </div>

            <div class="input-field">
                <input type="number" id="tpo_contact1" name="tpo_contact1" required>
                <label class="active" for="tpo_contact1">Institute TPO Contact Number-1</label>
            </div>

            <div class="input-field">
                <input type="number" id="tpo_contact2" name="tpo_contact2">
                <label class="active" for="tpo_contact2">Institute TPO Contact Number-2</label>
            </div>

            <div class="input-field">
                <input type="email" id="tpo_email" name="tpo_email" class="validate">
                <label class="active" for="tpo_email">Institute TPO Email Id</label>
            </div>

            <div class="input-field">
                <input type="number" id="num_cmp" name="num_cmp">
                <label class="active" for="num_cmp">Institute Total Number of Computers</label>
            </div>

            <div class="input-field">
                <input type="number" id="num_cmplab" name="num_cmplab">
                <label class="active" for="num_cmplab">Institute Total Number of Computer Lab</label>
            </div>

            <div class="input-field">
                <input type="number" id="min_num_cmp" name="min_num_cmp">
                <label class="active" for="min_num_cmp">Minimum Number of Computers in a Lab</label>
            </div>

            <div class="input-field">
                <input type="number" id="ispeed" name="ispeed">
                <label class="active" for="ispeed">Institute Internet Speed (calculated only in Kbps)</label>
            </div>

            <div class="input-field">
                <input type="number" id="hall_cap" name="hall_cap">
                <label class="active" for="hall_cap">Institute Total Hall Capacity</label>
            </div>

            <div class="input-field">
                <input type="number" id="num_cctv" name="num_cctv">
                <label class="active" for="num_cctv">Institute Total CCTV Camera in LAB</label>
            </div>

            <div class="row">
                <div class="col s3" style="color: #9E9E9E;">Institute Has Optical Fiber LAN: </div>

                <div class="col s9">
                    <input class="with-gap" name="has_fiber" type="radio" id="has_fiber1" value="yes">
                    <label for="has_fiber1">Yes</label>
                    <input class="with-gap" name="has_fiber" type="radio" id="has_fiber2" value="no">
                    <label for="has_fiber2">No</label>
                </div>
            </div>

            <button class="btn btn-large red left" type="reset">Reset</button>
            <button class="btn btn-large green right" type="submit">Submit</button>

            <div class="clearfix"></div>
        </form>
    </div>

    <footer class="page-footer blue darken-3">
        <div class="footer-copyright blue darken-4">
            <div class="container">
                Copyright � 2018. CPC, West Bengal
                <a class="grey-text text-lighten-4 right" href="http://gcettb.ac.in/home">Designed at GCETTB</a>
            </div>
        </div>
    </footer>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
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
            $('#dst').show();
            $('#wsd').hide();

            $('#dsts').change(function () {
                var selected = $('#dsts option:selected').text();
                if(selected == 'West Bengal (WB)') {
                    $('#dst').hide();
                    $('#wsd').show();
                }
                else {
                    $('#dst').show();
                    $('#wsd').hide();
                }
            });
        });
    </script>
</body>

</html>