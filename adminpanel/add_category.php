<?php include 'library/header.php'; ?>
				<div class="row mt-2">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">Add New Category</div>
							<div class="card-body">
								<form action="" method="POST">
									<div class="form-group">
										<label>Name Category</label>
										<input type="text" name="category" class="form-control" />
										<input type="hidden" value="1" name="category_status" />
									</div>
									<div class="form-group">
										<input type="submit" name="addcategory" class="btn btn-success" value="Add Category" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
<?php 


	include 'library/footer.php';
	if(isset($_POST['addcategory'])){
		$cate_name = $_POST['category'];
		$cate_status = $_POST['category_status'];
		include '../connection.php';
		$sql = "INSERT INTO categories(cate_name,cate_status)VALUES('$cate_name','$cate_status')";
		
		$insert = mysqli_query($con,$sql);
		
		if($insert){
			?>
			<script type="text/javascript">
				swal("Success","Category Successfully Added","sucess");
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				swal("Failed","Category Failed TO Add","error");
			</script>
			<?php
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	



 ?>