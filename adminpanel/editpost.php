<?php 
	include 'library/header.php';
	include '../connection.php';
	$id = $_GET['post_id'];
	$sql = "Select categories.cate_name,posts.* FROM posts INNER JOIN categories ON categories.cate_id = posts.cate_id WHERE post_id= '$id'";
	
	$run = mysqli_query($con,$sql);
	$result = mysqli_fetch_assoc($run);

 ?>
				<div class="row mt-2">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">Edit  POST</div>
							<div class="card-body">
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label>Title</label>
										<input type="text" name="posttitle" class="form-control" value="<?php echo $result['post_title']; ?>" />
									</div>
									<div class="form-group">
										<select class="form-control" name="cate_id">
										<?php 
											$sql1 = "SELECT * FROM categories WHERE cate_status = '1'";
											
											$run = mysqli_query($con,$sql1);
											while($cate = mysqli_fetch_assoc($run)){
												?>
												<option <?php if($cate['cate_id'] == $result['cate_id']){echo "selected";} ?> value="<?php echo $cate['cate_id']; ?>"><?php echo $cate['cate_name']; ?></option>
												<?php
											}
										
										?>
										</select>
									</div>
									<div class="form-group">
										<label>Thumbnail</label>
										<br />
										<img src="../<?php echo $result['post_thumb']; ?>" id="thumb" width="80px" height="80px">
										<input type="hidden" name="oldphoto" value="<?php echo $result['post_thumb']; ?>" />
										<input type="file"  name="newthumb" class="form-control-file" onchange="photo(this);" accept="image/*" />
									</div>
									<div class="form-group">
										<label>News Description</label><br />
										<textarea name="description" cols="30" rows="5">
											<?php echo $result['post_desc']; ?>
										</textarea>
									</div>
									<div class="form-group">
										<input type="hidden" name="post_id" value="<?php echo $result['post_id']; ?>"  />
										<input type="submit" name="updatepost" class="btn btn-success" value="Update Post" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					function photo(input) {
						  if (input.files && input.files[0]) {
							  var reader = new FileReader();
							  reader.onload = function (e) {
								  $('#thumb')
								  .attr('src', e.target.result)
								  .attr("class","img-thumbnail mb-2")
							  };
							  reader.readAsDataURL(input.files[0]);
						  }
						}
				</script>
			<?php 
			
				include 'library/footer.php';
				if(isset($_POST['updatepost'])){
					$post_title = $_POST['posttitle'];
					$cate_id = $_POST['cate_id'];
					$post_desc = $_POST['description'];
					$post_id = $_POST['post_id'];
					$oldphoto = $_POST['posttitle'];
					
					$newImage = $_FILES['newthumb']['name'];
					$tmpname = $_FILES['newthumb']['tmp_name'];
					
					if($newImage){
						unlink($oldphoto);
						$dir = '../images/';
						$full_path = $dir.$newImage;
						$uploadname= 'images/'.$newImage;
						
						move_uploaded_file($tmpname,$full_path);
						$update = "UPDATE posts SET post_title = '$post_title',cate_id='$cate_id',post_thumb='$uploadname',post_desc='$post_desc' WHERE post_id = '$post_id'";
						
						$run = mysqli_query($con,$update);
						if($run){
							?>
							<script type="text/javascript">
								swal('Updated','Data Updaed','success');
								window.open('all_post.php','_self');
							</script>
							<?php
						}
						else{
							?>
							<script type="text/javascript">
								swal('Failed','Data Update Failed','error');
								window.open('all_post.php','_self');
							</script>
							<?php
						}
					}
					else{
						$update = "UPDATE posts SET post_title = '$post_title',cate_id='$cate_id',post_thumb='$oldphoto',post_desc='$post_desc' WHERE post_id = '$post_id'";
						
						$run = mysqli_query($con,$update);
						if($run){
							?>
							<script type="text/javascript">
								swal('Updated','Data Updaed','success');
								window.open('all_post.php','_self');
							</script>
							<?php
						}
						else{
							?>
							<script type="text/javascript">
								swal('Failed','Data Update Failed','error');
								window.open('all_post.php','_self');
							</script>
							<?php
						}
					}
				}
				
				
				
				
				
			?>