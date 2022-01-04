<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}?>

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
                                <h5 class="text-primary"><b>Add Institution</b></h5>

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="admin_institutenewcheck.php">
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Name</b></label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter institution name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail"><b>Institution Logo</b></label>
                                        <input type="text" name="logo" class="form-control" id="logo" placeholder="Enter institution logo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Ranking</b></label>
                                        <input type="text" name="ranking" class="form-control" id="ranking" placeholder="Enter institution ranking" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Site</b></label>
                                        <input type="text" name="site" class="form-control" id="site" placeholder="Enter institution site" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Username</b></label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter institution Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Password</b></label>
                                        <input type="text" name="password" class="form-control" id="password" placeholder="Enter institution password" required>
                                    </div>
                                    

                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Add Institution</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                       
                                        <br>
                                        
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