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

        nav .nav-wrapper .brand-logo img {
            height: 2em;
        }

        @media (min-width: 768px) {
            nav .nav-wrapper .brand-logo img {
                padding-left: 2em;
                height: 2em;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
                nav .nav-wrapper .brand-logo img {
                padding-left: 2em;
                height: 2em;
            }
        }

        @media (min-width: 481px) and (max-width: 767px) {
                nav .nav-wrapper .brand-logo img {
                height: 2em;
            }
        }

        @media (min-width: 320px) and (max-width: 480px) {
                nav .nav-wrapper .brand-logo img {
                height: 2em;
            }
        }
    </style>
</head>

<body>
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-wrapper blue darken-2 z-depth-1-half">
            <div class="brand-logo"><img src="../assets/images/bannerb6434bb3.png" alt="Logo"></div>
        </div>
    </nav>

    <main>
        <!-- MAIN BODY-->
        <div class="container" id="form-container">
            <h4>Registration Instructions</h4>
            <hr>
            <br>
            <div class="card">
                <div class="card-content">
                    <p>The institute registration form has been broken into multiple sections, Institute details, Head and TPO details
                    and Institute facilities, These fields are divided into 3 forms, You have to fill up one by one or else the submit
                    button at the end of the form will not work.</p>
                    <br>
                    <p>At last we will ask for an <strong>authorization letter</strong>  in the university / institute letterhead, signed 
                    by the Head of the Institute as a token of your consent to permit us to forward your university / institute name and
                    students database to potential campus recruiters and also your consent to participate in campus drives organised by
                    us on pure non monetary terms and conditions, apart from other campus related activities. The letter must be in PDF 
                    or JPEG/JPG format.</p>
                    <br>
                    <p>For any additional queries please contact us using the contact info as provided in the contact page of our website.</P>
                    <br>
                    <div class="center-align">
                        <a class="btn waves-effect waves-light blue" href="/institute/form.php">Proceed
                            <i class="material-icons right">arrow_forward</i>
                        </a>
                    </div>
                </div>
            </div>
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
</body>

</html>