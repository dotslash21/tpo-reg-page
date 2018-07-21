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
            <h4>Institute Details</h4>
            <hr><br>

            <div class="input-field">
                <input type="text" id="name" name="name" required>
                <label class="active" for="name">Institute Name</label>
            </div>
			<div class="input-field">
                <input type="number" id="inst_code" name="inst_code" required min="0">
                <label class="active" for="inst_code">Institute code</label>
            </div>
            <div class="input-field">
                <input type="text" id="uid" name="uid" required>
                <label class="active" for="uid">Institute User ID</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" required>
                <label class="active" for="password">Password</label>
            </div>
            <div class="input-field">
                <input type="number" id="estd" name="estd" min="1800" class="validate" required>
                <label class="active" for="estd">Institute Establishment Year</label>
            </div>

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

            <div class="input-field">
                <select name="inst_type" id="inst_type" required>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="Government">Government</option>
                    <option value="Government-Aided">Government-Aided</option>
                    <option value="Self-Financed">Self-Financed</option>
                </select>
                <label>Institute Type</label>
            </div>

            <div class="input-field">
                <select name="affli" id="affli" required>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="MAKAUT">Maulana Kalam Azad University of Technology</option>
                    <option value="CU">Calcutta University</option>
                    <option value="JU">Jadavpur University</option>
                    <option value="KU">University of Kalyani</option>
                </select>
                <label>Institute Affiliated By</label>
            </div>

            <div class="input-field">
                <select name="inst_appr" id="inst_appr" required>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">SELECT-1</option>
                    <option value="2">SELECT-2</option>
                    <option value="3">SELECT-3</option>
                </select>
                <label>Institute Approved By</label>
            </div>

            <div class="input-field">
                <textarea id="address" class="materialize-textarea" name="address" required></textarea>
                <label class="active" for="address">Institute Address</label>
            </div>

            <div class="input-field">
                <input type="number" id="pin" name="pin" pattern="\d{6}" min="0" required>
                <label for="pin" class="active">Institute PIN</label>
            </div>

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

            <div class="input-field" id="district_txt">
                <input type="text" id="ins_dst_txt" name="ins_dst">
                <label class="active" for="ins_dst_txt">Institute District</label>
            </div>

            <div class="input-field" id="district_sel">
            <select id="ins_dst_sel" name="">
				<?php 
					$a=['Alipurduar', 'Bankura', 'Birbhum', 'Cooch Behar', 'Dakshin Dinajpur','Darjeeling', 'Hooghly', 'Howrah', 'Jalpaiguri', 'Jhargram', 
					'Kalimpong','Kolkata','Malda', 'Murshidabad', 'Nadia', 'North 24 Parganas', 'Paschim Bardhaman','Paschim Medinipur', 'Purba Bardhaman',
					 'Purba Medinipur', 'Purulia', 'South 24 Parganas','Uttar Dinajpur'];
				for( $i = 0; $i<count($a);$i++ ){
				echo "<option value='$a[$i]'>$a[$i]</option>";};
				?>
	           </select>
                <label for="ins_dst_sel">Institute District</label>
            </div>

            <div class="input-field">
                <input type="number" id="number" name="number" class="validate" min="0" required>
                <label for="number" class="active">Institute Contact Number</label>
            </div>

            <div class="input-field">
                <input type="email" id="email" name="email" class="validate" required>
                <label class="active" for="email">Institute E-mail</label>
            </div>

            <div class="input-field">
                <input type="url" id="website" name="website" class="validate" required>
                <label class="active" for="website">Institute Website</label>
            </div>
            
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
                    $('#district_txt').attr("name", "");
                    $('#district_sel').show();
                    $('#district_sel').attr("name", "ins_dst");
                }
                else {
                    $('#district_txt').show();
                    $('#district_txt').attr("name", "ins_dst");
                    $('#district_sel').hide();
                    $('#district_sel').attr("name", "");
                }
            });
        });
    </script>
        
    <script>
        

        function clicked() {
            if(fromCheck()){
                formSave();
                location.href='http://www.google.com';
            }
        }

        function fromCheck() {
            for (let i = 0; i < 37;i++){
                if(i!=17){
                    if(document.forms['frm'][i].value == ""){
                        alert("Please check all empty fields" + document.forms['frm'][i].name );
                        return false;
                        break;
                    }
                }
            }
            return true;
        }

        function formSave(){
            if(typeof(Storage) !== 'undefined'){
                var has_fiber;
                if(document.getElementById('has_fiber1').checked){
                    has_fiber = document.getElementById('has_fiber1').value;
                }
                if(document.getElementById('has_fiber2').checked){
                    has_fiber = document.getElementById('has_fiber2').value;
                }

            sessionStorage.name = document.getElementById("name").value;    //name
            sessionStorage.inst_code = document.getElementById("inst_code").value;
            sessionStorage.uid = document.getElementById("uid").value;
            sessionStorage.password = document.getElementById("password").value;
            sessionStorage.estd = document.getElementById("estd").value; 
            sessionStorage.accrd = document.getElementById("accrd").value; 
            sessionStorage.inst_type = document.getElementById("inst_type").value; 
            sessionStorage.affli = document.getElementById("affli").value; 
            sessionStorage.inst_appr = document.getElementById("inst_appr").value; 
            sessionStorage.address = document.getElementById("address").value; 
            sessionStorage.pin = document.getElementById("pin").value; 
            sessionStorage.inst_state = document.getElementById("inst_state").value; 
            sessionStorage.ins_dst_sel = document.getElementById("ins_dst_sel").value; 
            sessionStorage.number = document.getElementById("number").value; 
            sessionStorage.email = document.getElementById("email").value; 
            sessionStorage.website = document.getElementById("website").value; 
            sessionStorage.head_name = document.getElementById("head_name").value; 
            sessionStorage.head_desg = document.getElementById("head_desg").value; 
            sessionStorage.head_mob = document.getElementById("head_mob").value; 
            sessionStorage.head_ph = document.getElementById("head_ph").value; 
            sessionStorage.head_email = document.getElementById("head_email").value; 
            sessionStorage.tpo_name = document.getElementById("tpo_name").value; 
            sessionStorage.tpo_contact1 = document.getElementById("tpo_contact1").value; 
            sessionStorage.tpo_contact2 = document.getElementById("tpo_contact2").value; 
            sessionStorage.tpo_email = document.getElementById("tpo_email").value; 
            sessionStorage.num_cmp = document.getElementById("num_cmp").value;
            sessionStorage.num_cmplab = document.getElementById("num_cmplab").value;
            sessionStorage.min_num_cmp = document.getElementById("min_num_cmp").value;
            sessionStorage.ispeed = document.getElementById("ispeed").value;
            sessionStorage.hall_cap = document.getElementById("hall_cap").value;
            sessionStorage.num_cctv = document.getElementById("num_cctv").value;
            sessionStorage.has_fiber = has_fiber;
            }
            else{
                alert("Oops! Your browser don't support Web Storage");
            }
        }
    </script>
</body>

</html>