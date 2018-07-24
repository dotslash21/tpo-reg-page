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

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        #form-div {
            border-right: 1px solid rgba(0,0,0,0.35);
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

    <main>
        <div class="container z-depth-3" id="form-container">
            <h3>File Input</h3>
            <hr>
            <p>PDF and JPG, Less than 2MB</p><br>
            <!-- File Input Section -->
            <div class="row">
            <div class="col s6" id="form-div">
            <form action="file_upload.php" method="post" enctype="multipart/form-data">
                <div class="file-field input-field">
                    <div class="btn blue darken-3">
                        <span>Choose File</span>
                        <input type="file" name="uploadfile">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="No file chosen!">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-large green right">Submit</button>
                <div class="clearfix"></div>
            </form>
            </div>
            <div class="col s6">
            <?php
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $err= $_FILES['uploadfile']['error'];
                    if($err > 0){
                        echo '<span style="color: #EA4335;"> File Uploading Failed. Try again </span>';
                    }
                    else{
                        if($_FILES['uploadfile']['type'] == 'image/jpeg' || $_FILES['uploadfile']['type'] == 'application/pdf' ){
                            if($_FILES['uploadfile']['size'] < (1024*1024*1024*2) ){
                                $temp = explode(".", $_FILES["uploadfile"]["name"]);
                                $newfilename ="111".".". end($temp);
                                move_uploaded_file($_FILES['uploadfile']['tmp_name'],dirname(__FILE__)."/upload/".$newfilename);
                                echo "File uploaded Succesfully" ."<br/>";
                                echo "Uploaded file" . $_FILES['uploadfile']['name'];
                            }
                            else{
                                echo '<span style= "color: #EA4335;" > File Too large. Try less than 2 MB </span>';
                            }
                        }
                        else{
                            echo '<span style="color: #EA4335;"> File type Mismatched. Try JPG or PDF </span>';
                        }
                    }   
                }
            ?>
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