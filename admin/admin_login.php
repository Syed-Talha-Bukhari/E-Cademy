<?php
session_start();

?>
<!doctype html>


<head>

    <title>Login</title>



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
                                if (isset($_SESSION['logStatus'])) {
                                    if ($_SESSION['logStatus'] == 0) {

                                ?>
                                        <p>
                                            Login failed . Try again
                                        </p>
                                <?php
                                    }
                                }
                                ?>
                                <h5 class="text-primary"><b>Login</b></h5>

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="admin_logincheck.php">
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail"><b>Username</b></label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword"><b>Password</b></label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                    </div>

                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                    <div class="mt-4 text-center">

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
unset($_SESSION["logStatus"]);
?>