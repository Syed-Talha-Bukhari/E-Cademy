<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}

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


    <div class="section-title">
        <h2 style="color:#4c5a7d">Manage Databases</h2>

    </div>

    <div style="display: flex;">
        <div class="container">


            <div class="text-center pt-5">

                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_students.php'">Manage </button>
            </div>
            <div class="section-title mb-0 pb-2">

                <h5>Manage Students</h5>


            </div>
        </div>
        <div class="container">

            <div class="text-center pt-5">
                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_instructors.php'">Manage </button>
            </div>
            <div class="section-title mb-0 pb-2">
                <h5>Manage Instructors</h5>
            </div>



        </div>
        <div class="container">

            <div class="text-center pt-5">
                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_institutions.php'">Manage </button>
            </div>
            <div class="section-title mb-0 pb-2">
                <h5>Manage Institutions</h5>


            </div>
        </div>
    </div>

    <div style="display: flex;">
        <div class="container">


            <div class="text-center pt-5">

                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_courses.php'">Manage </button>
            </div>
            <div class="section-title mb-0 pb-2">

                <h5>Manage Courses</h5>


            </div>
        </div>
        <div class="container">

            <div class="text-center pt-5">
                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_organization.php'">Manage </button>
            </div>
            <div class="section-title mb-0 pb-2">
                <h5>Manage Organizations</h5>
            </div>



        </div>
        <div class="container">

            <div class="text-center pt-5">
                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_enrolled.php'">Manage </button>
            </div>
            <div class="section-title mb-0 pb-2">
                <h5>Manage Enrollments</h5>


            </div>
        </div>
    </div>
    <div style="display: flex;">
        <div class="container">


            <div class="text-center pt-5">

                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_degree.php'">Manage </button>
            </div>
            <div class="section-title mb-0 pb-2">

                <h5>Manage Degrees</h5>


            </div>
        </div>
        <div class="container">

            <div class="text-center pt-5">
                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_admin.php'">Manage </button>
            </div>
            <div class="section-title mb-0 pb-2">
                <h5>Manage Admin</h5>
            </div>



        </div>
        <div class="container">

            <div class="text-center pt-5">
                <button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="window.location.href='admin_log.php'">Show </button>
            </div>
            <div class="section-title mb-0 pb-2">
                <h5>Show database history</h5>


            </div>
        </div>
    </div>