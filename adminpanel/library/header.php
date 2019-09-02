<?php 
	session_start();
	if(isset($_SESSION['email'])){
		
	}
	else{
		header('location:index.php');
	}

 ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>My Blog</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
</head>
<body>
	<div class="">
		<div class="">
			<div class="bg-warning">
				<strong class="ml-5">Welcome <?php echo $_SESSION['name']; ?></strong>
				<strong class="float-right mr-5"><a href="logout.php">Log Out</a></strong>
			</div>
			<div class="row">
			<div class="col-md-4 bg-dark" style="height:800px;">
				<ul class="nav flex-column bg-dark">
				  <li class="nav-item">
					<a class="nav-link active text-white" href="">Dashboard</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link text-white" href="add_admin.php">Add Admin</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link text-white" href="all_admin.php">All Admin</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link text-white" href="add_post.php">Add Post</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link text-white" href="all_post.php">All Post</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link text-white" href="add_category.php">Add Category</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link text-white" href="all_category.php">All Category</a>
				  </li>
				</ul>
			</div>
			<div class="col-md-8">