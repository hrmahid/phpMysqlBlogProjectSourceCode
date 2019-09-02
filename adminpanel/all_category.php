<?php 

	include 'library/header.php';
	include '../connection.php';
	$sql = "SELECT * FROM categories";
	$run = mysqli_query($con,$sql);



?>
				
			<table class="table table-bordered mt-2">
				<tr>
					<th>SL</th>
					<th>Name</th>
					<th>Staus</th>
					<th>Action</th>
				</tr>
				<?php 
					$sl = 1;
					while($result = mysqli_fetch_assoc($run)){
						
				?>
				<tr>
					<td><?php echo $sl++ ?></td>
					<td><?php echo $result['cate_name']; ?></td>
					<td>
						<?php 
							if($result['cate_status'] == 1){
								?>
								<span class="badge badge-success">Active</span>
								<?php
							}
							else{
								?>
								<span class="badge badge-danger">Deactive</span>
								<?php
							}
						?>
					</td>
					<td>
						<?php 
							if($result['cate_status'] == 1){
						?>
							<form action="" method="POST">
							<input type="hidden" name="cate_id" value="<?php echo $result['cate_id']; ?>" />
							<input type="submit" name="deactive" class="btn btn-sm btn-danger" value="Deactive" />
							</form>
						<?php
							}
							else{
							?>
							<form action="" method="POST">
							<input type="hidden" name="cate_id" value="<?php echo $result['cate_id']; ?>" />
							<input type="submit" name="active" class="btn btn-sm btn-success" value="Active" />
							</form>
							<?php
							}
						?>
					</td>
				</tr>
				<?php 
				
					}
				?>
			</table>
			<?php 
				include 'library/footer.php'; 
				if(isset($_POST['deactive'])){
					$id = $_POST['cate_id'];
					$sql = "UPDATE categories SET cate_status = '0' WHERE cate_id = '$id'";
					$run = mysqli_query($con,$sql);
					header('location:all_category.php');
				}
				if(isset($_POST['active'])){
					$id = $_POST['cate_id'];
					$sql = "UPDATE categories SET cate_status = '1' WHERE cate_id = '$id'";
					$run = mysqli_query($con,$sql);
					header('location:all_category.php');
				}
			
			
			
			
			
			?>