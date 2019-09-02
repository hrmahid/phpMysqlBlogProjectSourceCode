<?php 

	include 'library/header.php'; 
	include '../connection.php';
	$sql = "SELECT * FROM admin";
	$run = mysqli_query($con,$sql);
	

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
				
			<table class="table table-bordered mt-2">
				<tr>
					<th>SL</th>
					<th>Name</th>
					<th>E-mail</th>
					<th>Phone</th>
					<th>Action</th>
				</tr>
				<?php
					$sl = 1;
					while($result = mysqli_fetch_assoc($run)){
						?>
					<tr>
						<td><?php echo $sl++ ?></td>
						<td><?php echo $result['name']; ?></td>
						<td><?php echo $result['email']; ?></td>
						<td><?php echo $result['phone']; ?></td>
						<td>
							<button data-target="#<?php echo $result['admin_id']; ?>" data-toggle="modal" class="btn btn-sm btn-info">View</button>
							<button data-target="#<?php echo $result['name']; ?>" data-toggle="modal" class="btn btn-sm btn-success">Edit</button>
							<form action="" method="POST">
								<input type="hidden" name="adminid" value="<?php echo $result['admin_id']; ?>" />
								<button  type="submit" name="submit" class="btn btn-sm btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					<div class="modal fade" id="<?php echo $result['admin_id']; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							Admin Info
						</div>
						<div class="modal-body">
							<p>Name</p>
							<p><?php echo $result['name']; ?></p>
							<p>E-mail</p>
							<p><?php echo $result['email']; ?></p>
							<p>Phone</p>
							<p><?php echo $result['phone']; ?></p>
						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" type="button" class="btn btn-danger">Close</button>
						</div>
					</div>
				</div>
			</div>
			
			<!---Edit Modal--->
			<div class="modal fade" id="<?php echo $result['name']; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							Edit Info
						</div>
						<form action="" method="POST">
						<div class="modal-body">
							<p>Name</p>
							<input type="text" name="name" value="<?php echo $result['name']; ?>" class="form-control" />
							<p>E-mail</p>
							<input type="email" name="email" value="<?php echo $result['email']; ?>" class="form-control" />
							<p>Phone</p>
							<input type="text" name="phone" value="<?php echo $result['phone']; ?>" class="form-control" />
							<input type="hidden" name="admin_id" value="<?php echo $result['admin_id']; ?>" />
						</div>
						<div class="modal-footer">
							<button  type="submit" name="update" class="btn btn-primary">Save</button>
							<button data-dismiss="modal" type="button" class="btn btn-danger">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
						<?php
					}
				?>
				
				
			</table>
			
			
			
			
			
			
			

<?php
				if(isset($_POST['submit'])){
					$admin_id = $_POST['adminid'];
					$sql = "DELETE FROM admin WHERE admin_id = '$admin_id'";
					$run = mysqli_query($con,$sql);
					if($run == true){
						?>
						<script type="text/javascript">
							swal("Deleted","Data Deleted","success");
						</script>
						<?php
					}
					else{
						?>
						<script type="text/javascript">
							swal("Failed","Data Delete Failed","warning");
						</script>
						<?php
					}
				}
				
				//Data Update
				if(isset($_POST['update'])){
					$name = $_POST['name'];
					$email = $_POST['email'];
					$phone = $_POST['phone'];
					$id = $_POST['admin_id'];
					
					
					$sql = "UPDATE admin SET name = '$name',email = '$email',phone = '$phone' WHERE admin_id = '$id'";
					$update = mysqli_query($con,$sql);
					if($update){
						?>
						<script type="text/javascript">
							swal("Updated","Data Updated Success","success");
							window.open('all_admin.php','_self');
						</script>
						<?php
					}
					else{
						?>
						<script type="text/javascript">
							swal("Failed","Failed To Update","error");
							window.open('all_admin.php','_self');
						</script>
						<?php
					}
				}
			
			
			?>

<?php include 'library/footer.php'; ?>