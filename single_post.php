<?php
	include 'menubar.php';

 ?>
	<div class="row">
		<div class="col-md-8">
			<div class="card shadow bg-light">
				<div class="card-body">
					<?php 
						$id = $_GET['pid'];
						include 'connection.php';
						$sql = "SELECT * FROM posts WHERE post_id = '$id'";
						$run = mysqli_query($con,$sql);
						$result = mysqli_fetch_assoc($run);
					
					?>
					<div class="posts shadow bg-light">
						<h4 class="titlepost"><?php echo $result['post_title']; ?></h4>
						<span>Author: <i><?php echo $result['post_by']; ?></i></span>
						<span class="float-right">Date: <i><?php echo $result['post_date']; ?></i></span>
						<hr />
						<img src="<?php echo $result['post_thumb']; ?>" style="width:100%;height:200px;" />
						<p>
							<?php echo $result['post_desc']; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card-body sidebar">
				<h4 class="titlepost">Recent Posts</h4>
				<ul>
					<li><a href="">This is a post</a></li>
					<li><a href="">This is a post</a></li>
					<li><a href="">This is a post</a></li>
					<li><a href="">This is a post</a></li>
					<li><a href="">This is a post</a></li>
					<li><a href="">This is a post</a></li>
					<li><a href="">This is a post</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>