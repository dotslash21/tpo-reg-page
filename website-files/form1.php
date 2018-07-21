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
        <form method="POST" name="frm" id="form1">
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
                    <?php include("./page-part/inst_state.php"); ?>
                </select>
                <label>Institute State</label>
            </div>

            <div class="input-field" id="district_txt">
                <input type="text" id="ins_dst_txt" name="ins_dst">
                <label class="active" for="ins_dst_txt">Institute District</label>
            </div>

            <div class="input-field" id="district_sel">
                <select id="ins_dst_sel" name="">
                    <?php include("./page-part/ins_dst_sel.php"); ?>
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
    <script src="./assets/js/dist_change.js"></script>
</body>

</html>