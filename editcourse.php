<?php
session_start();
include_once 'connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:instructor_login.php');
}
$edit = 1;
$code = $_POST['number'];
$query = "SELECT * FROM course NATURAL JOIN course_details NATURAL JOIN course_info WHERE id = '$code';";
$result = mysqli_query($conn, $query);
$check = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($check == 0) {
    $edit = 0;
    $_SESSION['edit'] = $edit;
    header('Location:instructor_course.php');
}
$_SESSION['id'] = $code;
?>

<!doctype html>

<title>Add course</title>


<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

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
                                <h5 class="text-primary"><b>Edit course</b></h5>

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="editcoursecheck.php">
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Course Name</b></label>
                                        <input type="text" value="<?php echo $row['name'] ?>" name="name" class="form-control" id="name" placeholder="Enter course name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail"><b>Course Field</b></label>
                                        <input type="text" value="<?php echo $row['field'] ?>" name="field" class="form-control" id="field" placeholder="Enter course field" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Course Language</b></label>
                                        <input type="text" value="<?php echo $row['lang'] ?>" name="lang" class="form-control" id="lang" placeholder="Enter course language" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Course Picture Link</b></label>
                                        <input type="text" value="<?php echo $row['pic'] ?>" name="pic" class="form-control" id="pic" placeholder="Enter course picture link" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Course Estimated Time</b></label>
                                        <input type="text" value="<?php echo $row['est_time'] ?>" name="time" class="form-control" id="time" placeholder="Enter course estimated time" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Course Price</b></label>
                                        <input type="text" value="<?php echo $row['price'] ?>" name="price" class="form-control" id="price" placeholder="Enter course price" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Course Level</b></label>
                                        <input type="text" value="<?php echo $row['level'] ?>" name="level" class="form-control" id="level" placeholder="Enter course level" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"><b>Course Pre-requisites</b></label>
                                        <input type="text" value="<?php echo $row['pre_reqs'] ?>" name="prereq" class="form-control" id="prereq" placeholder="Enter course pre-requisites" required>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button name="login" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Edit course</button>
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