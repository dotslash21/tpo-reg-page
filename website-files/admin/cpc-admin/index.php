<?php
    $a = rand();
    $a = md5($a);
    session_start();
    $_SESSION['RED'] = $a;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onload="re()">
    <script>
        function re() {
            window.location = "../login.php?q=<?php echo $a;?>"; 
        }
    </script>
</body>
</html>