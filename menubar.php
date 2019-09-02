<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>My Blog</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<div class="container">
			<!--Menubar-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
			<a class="navbar-brand" href="index.php">My Blog</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    			<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Category
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php
							include 'connection.php';
							$sql = "SELECT * FROM categories WHERE cate_status = '1'";
							$run = mysqli_query($con,$sql);
							while($result = mysqli_fetch_assoc($run)){
						?>
						<a class="dropdown-item" href="category.php?cate_id=<?php echo $result['cate_id']; ?>"><i class="fa fa-user"></i> <?php echo $result['cate_name']; ?></a>
						<?php
							}
						?>
					</div>
				</li>
				<li class="nav-item"><a href="" class="nav-link">About</a></li>
				<li class="nav-item"><a href="" class="nav-link">Contact</a></li>
			</ul>
		</div>
	</nav>
	<!--End Menubar-->
	<div class="container">
		<div class="row bg-warning">
		<div class="col-md-12">
			<h6 class="float-left ml-5">Date: <?php echo date('d-m-Y'); ?></h6>
			<h6 class="float-right mr-5">Time: 09:20 PM</h6>
		</div>
	</div>
	</div>