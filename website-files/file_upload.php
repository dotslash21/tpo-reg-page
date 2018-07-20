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
            <hr><br>
            <!-- File Input Section -->
            <form action="file_upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="uploadfile" id="">
                <button type="submit" name='submit'>Submit</button>
            </form>
            <p>PDF and JPG, Less than 2MB</p>
            <?php
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $err= $_FILES['uploadfile']['error'];
                    if($err > 0){
                        echo 'File Uploading Failed. Try again';
                    }
                    else{
                        echo "Uploaded file" . $_FILES['uploadfile']['name']."<br/>";
                        if($_FILES['uploadfile']['type'] == 'image/jpeg' || $_FILES['uploadfile']['type'] == 'application/pdf' ){
                            if($_FILES['uploadfile']['size'] < (1024*1024*1024*2) ){
                                move_uploaded_file($_FILES['uploadfile']['tmp_name'],dirname(__FILE__)."/upload/".$_FILES['uploadfile']['name']);
                                echo "File uploaded Succesfully";
                            }
                            else{
                                echo "File Too large. Try less than 2 MB";
                            }
                        }
                        else{
                            echo "File type Mismatched. Try JPG or PDF";
                        }
                    }   
                }
            ?>
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







GUD MARA

echo $image_name= $_FILES['image']['name']; echo "<br>"; 
	echo $image_size= $_FILES['image']['size']; echo "<br>";
	echo $image_tmp_name= $_FILES['image']['tmp_name']; echo "<br>";
	echo $image_type = $_FILES['image']['type']; echo "<br>";
	
	echo $file_ext = strtolower(end(explode(".",$_FILES['image']['name'])));
	
	$arr = array("jpeg","jpg","png","gif");
	echo $newfilename = time().rand(0,9999).$image_name;
	
	//if(in_array($file_ext,$arr)){
		//if($image_size < 200000){
			move_uploaded_file($_FILES['image']['tmp_name'],"C:/xampp/htdocs/".$newfilename);
			echo "Upload Successfull";