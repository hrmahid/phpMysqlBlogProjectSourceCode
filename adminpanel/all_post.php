<?php  

	include 'library/header.php'; 
	include '../connection.php';
	$sql = "Select categories.cate_name,posts.* FROM posts INNER JOIN categories ON categories.cate_id = posts.cate_id";
	
	$run = mysqli_query($con,$sql);
	
?>

				
			<table class="table table-bordered mt-2">
				<tr>
					<th>SL</th>
					<th>Title</th>
					<th>Category</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
				<?php 
					$sl = 1;
					while($result = mysqli_fetch_assoc($run)){
						?>
					
				<tr>
					<td><?php echo $sl++ ?></td>
					<td><?php echo $result['post_title']; ?></td>
					<td><?php echo $result['cate_name']; ?></td>
					<td><img src="../<?php echo $result['post_thumb']; ?>" width="80px" alt="" /></td>
					<td>
						<a href="" class="btn btn-sm btn-info">View</a>
						<a href="editpost.php?post_id=<?php echo $result['post_id']; ?>" class="btn btn-sm btn-success">Edit</a>
						<a href="" class="btn btn-sm btn-danger">Delete</a>
					</td>
				</tr>
				<?php 
				
					}
				?>
			</table>
<?php include 'library/footer.php'; ?>