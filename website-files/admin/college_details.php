<?php
    session_start();

    define('_incFuncwwrfbhdjrt',true);
    require '../inc2357v3cn425073p4y53w79/func.php';

    admin::accessOfAdmin();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel | CPC TPO Registration</title>
    <meta charset="utf-8" />
    <meta name="token" content="<?php echo XCSRF::mkcsrf('ad-clg-det'); ?>">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
    </style>
</head>

<body>
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-wrapper blue darken-3 z-depth-1-half">
            <a href="#!" class="brand-logo center">ADMIN LOGIN PANEL</a>
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
    <main>
        <div class="container z-depth-3" id="form-container">
            <h3 class="center-align">COLLEGE DETAILS</h3>
            <hr>
            <br>

            <!-- Print Button -->
            <div class="row">
                <div class="col s10">
                    <div class="row">
                        <div class="col s2">
                            <span>Filter by: </span>
                        </div>
                        <div class="col s5">
                            <div class="input-field">
                                <select multiple id="degree_sel" class="degree_sel">
                                    <!-- Degree Select Options -->
                                </select>
                                <label>Degree</label>
                            </div>
                        </div>
                        <div class="col s5">
                            <div class="input-field">
                                <select multiple id="course_sel" class="course_sel">
                                    <!-- Course Select Options -->
                                </select>
                                <label>Courses</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s2">
                    <button class="btn btn-large waves-effect waves-light blue darken-1" id="printall">
                        PRINT ALL
                    </button>
                </div>
            </div>

            <!-- Indivisual College Details print -->
            <?php

                //Sql
                $smt_clg = $pdocon->prepare("SELECT inst_name,inst_code FROM cred ORDER BY inst_name ASC");
                $smt_clg->execute();
                while($res_arr = $smt_clg->fetch(PDO::FETCH_ASSOC)){
            ?>

            <!-- College Cards -->
            <div class="card-panel z-depth-2 modal-trigger" href="#modal-<?php echo $res_arr['inst_code']; ?>" id="trig-<?php echo $res_arr['inst_code']; ?>">

                <div class="valign-wrapper left">
                    <i class="material-icons">account_balance</i> <span><?php echo $res_arr['inst_name']; ?></span><span>(<?php echo $res_arr['inst_code']; ?>)</span>
                </div>
                <div class="right panel_options">
                    <button class="waves-effect waves-yellow btn yellow darken-3" id="edit-<?php echo $res_arr['inst_code']; ?>">EDIT</button>
                    <button class="waves-effect waves-red btn red lighten-2" id="delete-<?php echo $res_arr['inst_code']; ?>">DELETE</button>
                    <button class="waves-effect waves-blue btn blue lighten-2" id="print-<?php echo $res_arr['inst_code']; ?>">PRINT</button>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- All college Modal Structure -->
            <div id="modal-<?php echo $res_arr['inst_code']; ?>" class="modal modal-fixed-footer" >

                <div class="modal-content" id="modalcon-<?php echo $res_arr['inst_code']; ?>">
                </div>

                <div class="modal-footer">
                    <a href="javascript: void(0);" class="modal-action  waves-effect waves-blue btn-flat" id="print-<?php echo $res_arr['inst_code']; ?>" onclick='printDiv("modalcon-<?php echo $res_arr['inst_code']; ?>");'>PRINT</a>
                    <a href="javascript: void(0);" class="modal-action modal-close waves-effect waves-green btn-flat">DONE</a>
                </div>
            </div>

            <!-- script for value -->
            <script>
                $(document).ready(function () {
                    $("#trig-<?php echo $res_arr['inst_code']; ?>").click(function(){
                        if($("#uid-<?php echo $res_arr['inst_code']; ?>").length == 0){
                            $.get("../ajax/admin_college_indv.php?inst_code=<?php echo $res_arr['inst_code']; ?>", function(data){
                                $("#modalcon-<?php echo $res_arr['inst_code']; ?>").append(data.value);
                            }, "json")
                        }
                    })

                    //edit FN
                    $("#edit-<?php echo $res_arr['inst_code']; ?>").click(function () {
                        console.log("edit <?php echo $res_arr['inst_code']; ?>");
                        window.location = './record_edit.php?inst_code_edit=<?php echo $res_arr['inst_code']; ?>';
                    })

                    //Delete FN
                    $("#delete-<?php echo $res_arr['inst_code']; ?>").click(function (event) {
                        event.preventDefault();
                        if (window.confirm('Will you want to delete data of <?php echo $res_arr['inst_name']; ?> ?')){
                            // They clicked Yes
                            console.log("Delete <?php echo $res_arr['inst_code']; ?>");
                            var dataObj = {
                                clgId:  <?php echo $res_arr['inst_code']; ?>,
                                id:     $("meta[name='token']").attr("content")
                            }
                            $.ajax({
                                type: 'POST',
                                data: dataObj,
                                url: '../ajax/admin_record_delete.php',
                                dataType: 'json',
                                async: true,
                            })
                            .done(function (data) {
                                if(data.error !== undefined){
                                    alert(data.error);
                                }
                                if(data.success !== undefined){
                                    if(data.success){
                                        if (window.confirm('Succesfully deleted. Need Refresh. Want to Refresh?')){
                                            // They clicked Yes
                                            location.reload();
                                        }
                                        else{
                                            // They clicked no
                                            alert("Need a refresh");
                                        }
                                    }
                                }
                            })
                        }
    
                        else{
                            // They clicked no
                        }
                    })

                    //Print FN
                    $("#print-<?php echo $res_arr['inst_code']; ?>").click(function () {
                        console.log("print-<?php echo $res_arr['inst_code']; ?>");
                        if($("#uid-<?php echo $res_arr['inst_code']; ?>").length == 0){
                            $.get("../ajax/admin_college_indv.php?inst_code=<?php echo $res_arr['inst_code']; ?>", function(data){
                                $("#modalcon-<?php echo $res_arr['inst_code']; ?>").append(data.value);
                            }, "json")
                            .done(function () {
                                printDiv("modalcon-<?php echo $res_arr['inst_code']; ?>");
                            });
                            console.log("IF");
                        }
                        else {
                            printDiv("modalcon-<?php echo $res_arr['inst_code']; ?>");
                            console.log("ELSE");
                        }
                    })
                })
            </script>

            <?php
                }
            ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="../assets/js/admin_clg.js"></script>
    <script>
        $(".button-collapse").sideNav();
    </script>
    <script>
        $(document).ready(function () {
            $('.collapsible').collapsible();
        });
    </script>
    <script>
        $(document).ready(function () {
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('.panel_options').on('click', function (e) {
                // stop the event from bubbling.
                e.stopPropagation();
            });
        });
    </script>
    <script src="../assets/js/admin-college_details.js"></script>
</body>

</html>