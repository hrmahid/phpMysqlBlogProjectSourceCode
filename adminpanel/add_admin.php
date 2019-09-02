<?php include 'library/header.php'; ?>
				<div class="row mt-2">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">Add New Admin</div>
							<div class="card-body">
								<form action="add_admin.php" method="POST">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="username" class="form-control" />
									</div>
									<div class="form-group">
										<label>E-mail</label>
										<input type="email" name="useremail" class="form-control" />
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="userpassword" class="form-control" />
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" name="phone" class="form-control" />
									</div>
									<div class="form-group">
										<input type="submit" name="addadmin" class="btn btn-success" value="Add Admin" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
<?php 


	include 'library/footer.php'; 
	if(isset($_POST['addadmin'])){
		$name = $_POST['username'];
		$email = $_POST['useremail'];
		$password = sha1($_POST['userpassword']);
		$phone = $_POST['phone'];
		
		
		include '../connection.php';
		$sql = "INSERT INTO admin (name,email,password,phone) VALUES ('$name','$email','$password','$phone')";
		$run = mysqli_query($con,$sql);
		if($run){
			?>
			<script type="text/javascript">
				swal("Added","Admin Add","success");
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">alert('Data Insert Failed')</script>
			<?php
		}
		
	}





?>