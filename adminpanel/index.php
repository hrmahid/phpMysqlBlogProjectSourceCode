<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>My Blog Log In</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-4 offset-4">
				<div class="card">
					<div class="card-body shadow bg-light">
						<form action="index.php" method="POST">
							<div class="form-group">
								<label>E-mail</label>
								<input type="email" name="user_email" class="form-control" />
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="user_password" class="form-control" />
							</div>
							<div class="form-group">
								<input type="submit" name="log_in" class="btn btn-success" value="Log In" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
	
	if(isset($_POST['log_in'])){
		$useremail = $_POST['user_email'];
		$password = sha1($_POST['user_password']);
		
		include '../connection.php';
		
		$sql = "SELECT * FROM admin WHERE email = '$useremail' AND password = '$password'";
		$run = mysqli_query($con,$sql);
		$check = mysqli_num_rows($run);
		if($check == 0){
			?>
			<script type="text/javascript">alert('E-mail or Password Wrong');</script>
			<?php
		}
		else{
			 $result = mysqli_fetch_assoc($run);
			 $email = $result['email'];
			 $name = $result['name'];
			 session_start();
			 $_SESSION['email'] = $email;
			 $_SESSION['name'] = $name;
			 header('location:dashboard.php');
			 
			
		}
	}


?>







