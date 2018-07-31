<?php
    require("inc/db-con.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $inst_code = $_POST['inst_code'];
        $sql_inst = "SELECT * FROM cred WHERE inst_code ='".$inst_code."'";
        $result = mysqli_query($con, $sql_inst);
    }
?>

                        <div class="row">
                            <div class="col s6">Institute ID: XXXX</div>
                            <div class="col s6">Institute Code: XXXX</div>
                        </div>
                        <div class="row">
                            <div class="col s6">Establishment Year: 1234</div>
                            <div class="col s6">Accredition: NAAC-X</div>
                        </div>
                        <div class="row">
                            <div class="col s6">Insitute Type: XXXXXXXXXX</div>
                            <div class="col s6">Institute Affiliation: XXXXXX</div>
                        </div>
                        <div class="row">
                            <div class="col s6">Institute Approval: XXXX</div>
                            <div class="col s6"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col s6">Institute Address: 123, XXXX</div>
                            <div class="col s6">Pin: 1234567</div>
                        </div>
                        <div class="row">
                            <div class="col s6">State: XXXXXXXX</div>
                            <div class="col s6">District: XXXXXX</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col s6">Contact Number: 1234567890</div>
                            <div class="col s6">E-Mail: XXXXXXX@XXXX.XXX</div>
                        </div>
                        <div class="row">
                            <div class="col s6">Website: http://xxx.xxxxx.xxx/</div>
                            <div class="col s6"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col s6">Institute Head Name: XXXXXX XXXX</div>
                            <div class="col s6">Designation: XXX XXXX XXX</div>
                        </div>
                        <div class="row">
                            <div class="col s6">Contact (Mobile): 1234567890</div>
                            <div class="col s6">Contact (Landline): 1234567890</div>
                        </div>
                        <div class="row">
                            <div class="col s6">E-Mail: xxxxxxxx@xxxx.xxx</div>
                            <div class="col s6"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col s6">TPO Name: XXXXXX XXXXX</div>
                            <div class="col s6">Contact (1): 1234567890</div>
                        </div>
                        <div class="row">
                            <div class="col s6">Contact (2): 1234567890</div>
                            <div class="col s6">E-Mail: xxxxxxxxx@xxxx.xxx</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col s6">Total number of computers: 123</div>
                            <div class="col s6">Total number of computer lab: 123</div>
                        </div>
                        <div class="row">
                            <div class="col s6">Minimum number of computers in lab: 123</div>
                            <div class="col s6">Internet Speed: 123456 Kbps</div>
                        </div>
                        <div class="row">
                            <div class="col s6">Total Hall capacity: 123</div>
                            <div class="col s6">Total CCTV cameras in lab: 123</div>
                        </div>