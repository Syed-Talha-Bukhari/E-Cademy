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
                <h2 style="color:#4c5a7d">Database History</h2>

            </div>


<?php
$query = "SELECT * FROM log_table ;";
$result = mysqli_query($conn, $query);
$check = mysqli_num_rows($result);

if ($check > 0) {?>
    <table>
    <caption>History</caption>
    
    <tr style = "background-color:#4c5a7d ;color: white">
        <th>id</th>
        <th>table_name</th>
        <th>change_time</th>
        <th>change_type</th>
        <th>data_changed</th>
        
        
        
        
    </tr><?php
    while ($row = mysqli_fetch_array($result)) {?>
        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['table_name'] ?></td>
        <td><?php echo $row['change_time'] ?></td>
        <td><?php echo $row['change_type'] ?></td>
        <td><?php echo $row['data_changed'] ?></td>
        
        
        
    </tr>
    <?php
    }
}?></table>
