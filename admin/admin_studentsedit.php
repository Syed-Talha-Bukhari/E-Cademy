<?php
session_start();
include_once '../connect.php';
$edit = 1;
$code = $_POST['number'];
$query = "SELECT * FROM student NATURAL JOIN student_details NATURAL JOIN student_info NATURAL JOIN student_login WHERE id = '$code';";
$result = mysqli_query($conn, $query);
$check = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($check == 0){
    $edit = 0;
    $_SESSION['edit'] = $edit;
    header('Location:admin_students.php');
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
                                
                                <h5 class="text-primary"><b>Edit student details</b></h5>

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="admin_studentseditcheck.php">
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Full Name</b></label>
                                        <input type="text" value = "<?php echo $row['name']?>" type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail"><b>Email</b></label>
                                        <input type="email" type="text" value = "<?php echo $row['email']?>" name="email" class="form-control" id="email" placeholder="Enter your Email" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Gender</b></label>
                                        <input type="text" type="text" value = "<?php echo $row['gender']?>" name="gender" class="form-control" id="gender" placeholder="Enter gender" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Date of Birth</b></label>
                                        <input type="date" type="text" value = "<?php echo $row['date_of_birth']?>" name="date" class="form-control" id="date" placeholder="Enter date of birth" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword1"><b>Password</b></label>
                                        <input type="text" type="text" value = "<?php echo $row['password']?>" name="password1" class="form-control" id="password1" placeholder="Enter password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword2"><b>Enter initial balance</b></label>
                                        <input type="text" type="text" value = "<?php echo $row['Balance']?>" name="password2" class="form-control" id="password2" placeholder="Enter balance" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword3"><b>Enter organization key</b></label>
                                        <input type="text" type="text" value = "<?php echo $row['organization_key']?>" defaultValue = "abc" name="password3" class="form-control" id="password3" placeholder="Enter organization key">
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Edit student</button>
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