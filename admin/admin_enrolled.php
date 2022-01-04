<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}
$_SESSION['delete_req'] = 1;
?>
<link rel="stylesheet" href="../css/table.css" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/newcss.css" />

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
                        <li><a class="hover-btn-new log orange" href="../logout.php" data-toggle="modal" data-target="#login"><span>Logout</span></a></li>
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
                Wrong enrollment code . Try deletion again
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
                Wrong enrollment code . Try editing again
            </p>
    <?php
        }
    }
    ?>

    <div class="section-title">
        <h2 style="color:#4c5a7d">Manage Enrolled Students</h2>

    </div>

    <div style="display: flex;">
        <div class="container">


            <div class="text-center pt-5">

                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_enrollednew.php'">Create</button>
            </div>
            <div class="section-title mb-0 pb-2">

                <h5>Add new enrollment</h5>


            </div>
        </div>
        <div class="container">

            <div class="text-center pt-5">
                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="openForm1()">Edit</button>
            </div>
            <div class="section-title mb-0 pb-2">
                <h5>Edit enrollment details</h5>
            </div>



        </div>
        <div class="container">

            <div class="text-center pt-5">
                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="openForm()">Delete</button>
            </div>
            <div class="section-title mb-0 pb-2">
                <h5>Delete enrollment</h5>


            </div>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM enrolled;";
    $result = mysqli_query($conn, $query);

    $check = mysqli_num_rows($result);

    if ($check > 0) { ?>
        <table>
            <caption>Enrollment Records</caption>

            <tr style="background-color:#4c5a7d ;color: white">
                <th>course_id</th>
                <th>student_id</th>
                <th>status</th>





            </tr><?php
                    while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['course_id'] ?></td>
                    <td><?php echo $row['student_id'] ?></td>
                    <td><?php echo $row['status'] ?></td>



                </tr>
        <?php
                    }
                } ?>
        </table>

        <div class="form-popup" id="myForm">
            <form method="POST" action="admin_enrolleddelete.php" class="form-container" ;>
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
            <form method="POST" action="admin_enrollededit.php" class="form-container" ;>
                <div class="mb-3">
                    <label class="form-label" for="number"><b>Confirm Course Code</b></label>
                    <input type="text" name="number" id="number " class="form-control" placeholder="Course Code" required>
                </div>
                <div class="mt-3 text-end">
                    <button style="background-color:#4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" name="book" type="submit">Confirm Edit</button>
                </div>
            </form>
        </div>


        <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
            }

            function openForm1() {
                document.getElementById("myForm1").style.display = "block";
            }
        </script>
        <?php
        unset($_SESSION["delete"]);
        unset($_SESSION["edit"]);

        ?>