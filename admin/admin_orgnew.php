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
                                <h5 class="text-primary"><b>Add Organization</b></h5>

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="admin_orgnewcheck.php">
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Organization name</b></label>
                                        <input type="text" name="orgname" class="form-control" id="orgname" placeholder="Enter organization name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail"><b>Organization key</b></label>
                                        <input type="text" name="orgkey" class="form-control" id="orgkey" placeholder="Enter organization key" required>
                                    </div>
                                    

                                    
                                   
                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Add organization</button>
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
<?php
    unset($_SESSION["signStatus"]);
?>