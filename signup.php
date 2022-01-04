<?php
session_start();

?>
<!doctype html>


<head>
    
    <title>SignUp</title>

    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="index.php" class="mb-5 d-block auth-logo"> <img src="" alt="" height="22" class="logo logo-dark"> </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <?php
                                if (isset($_SESSION['signStatus'])){
                                if ($_SESSION['signStatus'] == 0){
                                    
                                    ?>
                                    <p >
                                        SignUp failed . Try again
                                    </p>
                                    <?php
                                }
                                }   
                                ?>
                                <h5 class="text-primary"><b>Sign Up</b></h5>

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="signupcheck.php">
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Full Name</b></label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail"><b>Email</b></label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your Email" required>
                                    </div>
                                    <label class="form-label" for="gender"><b>Gender</b></label>

                                    <div class="form-check">

                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Female
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Date of Birth</b></label>
                                        <input type="date" name="date" class="form-control" id="date" placeholder="Enter daye of birth" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword1"><b>Password</b></label>
                                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Enter password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword2"><b>Confirm Password</b></label>
                                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword3"><b>Are you part of an organization?</b></label>
                                        <input type="password" defaultValue = "abc" name="password3" class="form-control" id="password3" placeholder="Enter organization key">
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Sign Up</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Already have an account ? <a href="login.php" class="fw-medium text-primary"> Login Now </a> </p>
                                        <br>
                                        <p class="mb-0">Back to<a href="index.php" class="fw-medium text-primary"> <b>Home</b></a> </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        
    </div>

</body>

</html>
<?php
    unset($_SESSION["signStatus"]);
?>