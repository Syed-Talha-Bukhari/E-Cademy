<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}
$edit = 1;
$code = $_POST['number'];
$query = "SELECT * FROM degree NATURAL JOIN degree_details WHERE id = '$code';";
$result = mysqli_query($conn, $query);
if (!mysqli_query($conn,$query)) {
    echo("Error description: " . mysqli_error($conn));
  }
$check = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($check == 0){
    $edit = 0;
    $_SESSION['edit'] = $edit;
    header('Location:admin_enrolled.php');
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
                                <h5 class="text-primary"><b>Edit degree</b></h5>
                                
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="admin_degreeeditcheck.php">
                                <div class="mb-3">
                                        <label class="form-label" for="name"><b>Name</b></label>
                                        <input value = "<?php echo $row['name']?>" type="text" name="name" class="form-control" id="name" placeholder="Enter degree name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail"><b>Type</b></label>
                                        <input value = "<?php echo $row['type']?>" type="text" name="type" class="form-control" id="type" placeholder="Enter degree type" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Field</b></label>
                                        <input value = "<?php echo $row['field']?>" type="text" name="field" class="form-control" id="field" placeholder="Enter degree field" required>
                                    </div>
                                    
                                    
                                    
                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Edit degree</button>
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