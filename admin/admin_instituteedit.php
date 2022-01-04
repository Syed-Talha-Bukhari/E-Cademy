<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}

$edit = 1;
$code = $_POST['number'];
$query = "SELECT * FROM institution NATURAL JOIN institutions_details NATURAL JOIN institution_info NATURAL JOIN institution_login WHERE id = '$code';";
$result = mysqli_query($conn, $query);
$check = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($check == 0){
    $edit = 0;
    $_SESSION['edit'] = $edit;
    header('Location:admin_instructor.php');
}
$_SESSION['id'] = $code;
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
                                <h5 class="text-primary"><b>Edit Institution</b></h5> 
                                

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="admin_instituteeditcheck.php">
                                <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Name</b></label>
                                        <input type="text" value = "<?php echo $row['name']?>" name="name" class="form-control" id="name" placeholder="Enter institution name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail"><b>Institution Logo</b></label>
                                        <input type="text" value = "<?php echo $row['logo']?>" name="logo" class="form-control" id="logo" placeholder="Enter institution logo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Ranking</b></label>
                                        <input type="text" value = "<?php echo $row['ranking']?>" name="ranking" class="form-control" id="ranking" placeholder="Enter institution ranking" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Site</b></label>
                                        <input type="text" value = "<?php echo $row['site']?>" name="site" class="form-control" id="site" placeholder="Enter institution site" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Username</b></label>
                                        <input type="text" value = "<?php echo $row['username']?>" name="username" class="form-control" id="username" placeholder="Enter institution Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Institution Password</b></label>
                                        <input type="text" value = "<?php echo $row['password']?>" name="password" class="form-control" id="password" placeholder="Enter institution password" required>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Edit Institution</button>
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