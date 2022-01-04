<?php
session_start();
include_once 'connect.php';
if (!isset($_SESSION['email'])) {
	header('Location:login.php');
}
?>


<!DOCTYPE html>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/newcss.css" />


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


						<li class="nav-item"><a class="nav-link" href="enrolledcourse.php">Enrolled Courses</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a class="hover-btn-new log orange" href="logout.php" data-toggle="modal" data-target="#login"><span>Logout</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<?php
	if (isset($_SESSION['enroll'])) {
		if ($_SESSION['enroll'] == 0) {

	?>
			<p>
				Wrong course code . Try enrolling again
			</p>
	<?php
		}
	}
	?>


	<section class="course-section spad pb-0">
		<div class="section-title">
			<h2 style="color:#4c5a7d">All Courses</h2>

		</div>
		<div class="course-warp">

			<div class="row course-items-area">
				<?php
				$email = $_SESSION['email'];
				$query1 = "SELECT id FROM student_info WHERE email = '$email';";
				$result1 = mysqli_query($conn, $query1);
				$row1 = mysqli_fetch_array($result1);
				$stdid = $row1['id'];

				$query = "SELECT * FROM course_info NATURAL JOIN course_details;";
				$result = mysqli_query($conn, $query);
				$check = mysqli_num_rows($result);

				if ($check > 0) {
					while ($row = mysqli_fetch_array($result)) {
						$id = $row['id'];
						$query2 = "CALL return_price(@newprice,'$stdid','$id');";
						$result2 = mysqli_query($conn, $query2);
						$query3 = "SELECT @newprice;";
						$result3 = mysqli_query($conn, $query3);
						$row3 = mysqli_fetch_array($result3);
						$price = $row3['@newprice'];
				?>
						<div class="form-popup" id="myForm">
							<form method="POST" action="enrolled.php" class="form-container" ;>
								<div class="mb-3">
									<label class="form-label" for="number"><b>Confirm Course Code</b></label>
									<input type="text" name="number" id="number " class="form-control" placeholder="Course Code" required>
								</div>
								<div class="mt-3 text-end">
									<button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light " name="book" type="submit">Confirm Enrollment</button>
								</div>


							</form>
						</div>
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
										<h5><span><?php
													echo $row['name'];

													?></span></h5><br>

										<div class="students">

											<h6><span style="color:#4c5a7d"><b>Course code: </b></span><?php
																										echo $id;
																										?></h6>
											<h6><span style="color:#4c5a7d"><b>Course price: </b></span>$<?php
																											echo $price;
																											?></h6>
										</div>

									</div>
									<div class="course-author">


										<button style="background-color: #4c5a7d" class="btn btn-primary w-sm waves-effect waves-light" onclick="openForm()">Enroll</button>

									</div>
								</div>
							</div>
						</div>

				<?php
					}
				} else {
					header('Location:login.php');
				}
				?>


			</div>


	</section>
	<script>
		function openForm() {
			document.getElementById("myForm").style.display = "block";
		}
	</script>
</body>
<?php
unset($_SESSION["enroll"]);


?>