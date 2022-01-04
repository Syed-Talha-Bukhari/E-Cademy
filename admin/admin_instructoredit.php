<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}

$edit = 1;
$code = $_POST['number'];
$query = "SELECT * FROM instructor NATURAL JOIN instructor_details NATURAL JOIN instructor_info NATURAL JOIN instructor_login WHERE id = '$code';";
$result = mysqli_query($conn, $query);
$check = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($check == 0){
    $edit = 0;
    $_SESSION['edit'] = $edit;
    header('Location:admin_instructors.php');
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
                                <h5 class="text-primary"><b>Edit Instructor</b></h5>
                                

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="admin_instructoreditcheck.php">
                                <div class="mb-3">
                                        <label class="form-label" for="name"><b>Instructor Name</b></label>
                                        <input type="text" value = "<?php echo $row['name']?>" name="name" class="form-control" id="name" placeholder="Enter instructor name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail"><b>Instructor Linkedin</b></label>
                                        <input type="text" value = "<?php echo $row['linkedin']?>" name="linkedin" class="form-control" id="linkedin" placeholder="Enter instructor linkedin" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Instructor Bio</b></label>
                                        <input type="text" value = "<?php echo $row['bio']?>" name="bio" class="form-control" id="bio" placeholder="Enter instructor bio" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Instructor Designation</b></label>
                                        <input type="text" value = "<?php echo $row['designation']?>" name="designation" class="form-control" id="designation" placeholder="Enter instructor designation" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b> Institution ID</b></label>
                                        <input type="text" value = "<?php echo $row['institution_id']?>" name="institute" class="form-control" id="institute" placeholder="Enter institution ID" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Instructor Username</b></label>
                                        <input type="text" value = "<?php echo $row['username']?>" name="username" class="form-control" id="username" placeholder="Enter instructor Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Instructor Password</b></label>
                                        <input type="text" value = "<?php echo $row['password']?>" name="password" class="form-control" id="password" placeholder="Enter instructor password" required>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Edit Instructor</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Back to course ? <a href="instructor_course.php" class="fw-medium text-primary"> CLick Here </a> </p>
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