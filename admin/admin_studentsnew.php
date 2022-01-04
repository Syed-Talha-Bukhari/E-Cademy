<?php
session_start();

?>
<!doctype html>

    <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

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
                                        Student entry failed . Try again
                                    </p>
                                    <?php
                                }
                                }   
                                ?>
                                <h5 class="text-primary"><b>Add student</b></h5>

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="admin_studentsnewcheck.php">
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
                                        <label class="form-label" for="userpassword2"><b>Enter initial balance</b></label>
                                        <input type="text" name="password2" class="form-control" id="password2" placeholder="Enter balance" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword3"><b>Enter organization key</b></label>
                                        <input type="text" defaultValue = "abc" name="password3" class="form-control" id="password3" placeholder="Enter organization key">
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Add student</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                       
                                        <br>
                                      
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