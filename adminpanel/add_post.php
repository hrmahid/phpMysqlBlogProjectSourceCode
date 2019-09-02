<?php 
	include 'library/header.php';
	include '../connection.php';


 ?>
				<div class="row mt-2">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">Add New POST</div>
							<div class="card-body">
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label>Title</label>
										<input type="text" name="posttitle" class="form-control"  />
									</div>
									<div class="form-group">
										<select class="form-control" name="cate_id">
										<?php 
											$sql1 = "SELECT * FROM categories WHERE cate_status = '1'";
											
											$run = mysqli_query($con,$sql1);
											while($cate = mysqli_fetch_assoc($run)){
												?>
												<option value="<?php echo $cate['cate_id']; ?>"><?php echo $cate['cate_name']; ?></option>
												<?php
											}
										
										?>
										</select>
									</div>
									<div class="form-group">
										<label>Thumbnail</label>
										<input type="file" name="thumb" class="form-control-file" />
									</div>
									<div class="form-group">
										<label>News Description</label><br />
										<textarea name="description" cols="30" rows="5"></textarea>
									</div>
									<div class="form-group">
										<input type="submit" name="addpost" class="btn btn-success" value="Add Post" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php 
			
				include 'library/footer.php';
				if(isset($_POST['addpost'])){
					$title = $_POST['posttitle'];
					$cate_id = $_POST['cate_id'];
					$description = $_POST['description'];
					$postby = $_SESSION['name'];
					$postdate = date('d-m-Y');
					
					$img = $_FILES['thumb']['name'];
					$tmp_name = $_FILES['thumb']['tmp_name'];
					$directory = '../images/';
					$image_name = 'images/'.$img;
					$upload = move_uploaded_file($tmp_name,$directory.$img);
					
					if($upload){
						$sql = "INSERT INTO `posts`(`post_title`, `cate_id`, `post_thumb`, `post_desc`, `post_by`, `post_date`) VALUES('$title','$cate_id','$image_name','$description','$postby','$postdate')";
						
						$run = mysqli_query($con,$sql);
						if($run){
							?>
							<script type="text/javascript">
								swal('Added','Post Inserted','success');
							</script>
							<?php
						}
						else{
							?>
							<script type="text/javascript">
								swal('Failed','Post Insert Failed','error');
							</script>
							<?php
						}
					}
					else{
						?>
							<script type="text/javascript">
								swal('Failed','Image Upload Failed','error');
							</script>
							<?php
					}
				}






			?>