<?php
session_start();
include_once 'connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:instructor_login.php');
}

?>

<body class="host_version">
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="logout.php" data-toggle="modal" data-target="#login"><span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
    if (isset($_SESSION['delete'])) {
        if ($_SESSION['delete'] == 0) {

    ?>
            <p>
                Wrong course code . Try deletion again
            </p>
    <?php
        }
    }
    ?>
    <?php
    if (isset($_SESSION['edit'])) {
        if ($_SESSION['edit'] == 0) {

    ?>
            <p>
                Wrong course code . Try editing again
            </p>
    <?php
        }
    }
    ?>



    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/newcss.css" />

    <body>
        <?php
        $username = 0;
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        } ?>
        <section class="course-section spad pb-0">
            <div class="section-title">
                <h2 style="color:#4c5a7d">Manage Courses</h2>

            </div>

            <div style="display: flex;">
                <div class="container">


                    <div class="text-center pt-5">

                        <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='newcourse.php'">Create</button>
                    </div>
                    <div class="section-title mb-0 pb-2">

                        <h5>Create a new course</h5>


                    </div>
                </div>
                <div class="container">

                    <div class="text-center pt-5">
                        <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="openForm1()">Edit</button>
                    </div>
                    <div class="section-title mb-0 pb-2">
                        <h5>Edit course</h5>
                    </div>



                </div>
                <div class="container">

                    <div class="text-center pt-5">
                        <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="openForm()">Delete</button>
                    </div>
                    <div class="section-title mb-0 pb-2">
                        <h5>Delete course</h5>


                    </div>
                </div>
            </div>
            <div class="section-title">
                <br>
                <h2 style="color:#4c5a7d">Instructor Courses</h2>

            </div>
            <div class="row course-items-area">

                <?php
                $query = "SELECT *
                FROM instructor_login NATURAL JOIN instructor_info 
                JOIN course ON course.instructor_id = instructor_info.id 
                JOIN course_info ON course.id = course_info.id
                JOIN course_details ON course.id = course_details.id
                WHERE username = '$username';";
                $result = mysqli_query($conn, $query);
                $check = mysqli_num_rows($result);
                if ($check > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                ?>
                        <div class="mix col-lg-3 col-md-4 col-sm-6 finance">
                            <div class="course-item">
                                <div class="course-thumb set-bg" data-setbg="">

                                    <div class="price"></div>
                                    <img src="<?php echo $row['pic']; ?>" alt="Heloo">
                                </div>
                                <div class="course-info">
                                    <div class="course-text">
                                        <h6><span style="color:#4c5a7d"><b><?php
                                                                            echo $row['field'];

                                                                            ?></b></span></h6><br>
                                        <h5><?php
                                            echo $row['name'];
                                            ?></h5>

                                        <div class="students">
                                            <h6><span style="color:#4c5a7d"><b>Course code: </b></span><?php
                                                                                                        echo $id;
                                                                                                        ?></h6>
                                            <h6><span style="color:#4c5a7d"><b>Course price: </b></span>$<?php
                                                                                                            echo $row['price'];
                                                                                                            ?></h6>
                                        </div>
                                        <div class="course-author">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>

                <div class="form-popup" id="myForm">
                    <form method="POST" action="deletecourse.php" class="form-container" ;>
                        <div class="mb-3">
                            <label class="form-label" for="number"><b>Confirm Course Code</b></label>
                            <input type="text" name="number" id="number " class="form-control" placeholder="Course Code" required>
                        </div>
                        <div class="mt-3 text-end">
                            <button style="background-color:#4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" name="book" type="submit">Confirm Delete</button>
                        </div>


                    </form>
                </div>
                <div class="form-popup" id="myForm1">
                    <form method="POST" action="editcourse.php" class="form-container" ;>
                        <div class="mb-3">
                            <label class="form-label" for="number"><b>Confirm Course Code</b></label>
                            <input type="text" name="number" id="number " class="form-control" placeholder="Course Code" required>
                        </div>
                        <div class="mt-3 text-end">
                            <button style="background-color:#4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" name="book" type="submit">Confirm Edit</button>
                        </div>


                    </form>
                </div>


            </div>

        </section>
        <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
            }

            function openForm1() {
                document.getElementById("myForm1").style.display = "block";
            }
        </script>
    </body>
    <?php
    unset($_SESSION["delete"]);
    unset($_SESSION["edit"]);

    ?>