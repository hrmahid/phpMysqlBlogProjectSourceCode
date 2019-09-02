	<?php include 'menubar.php'; ?>
	<div class="row">
		<div class="col-md-8">
			<div class="card shadow bg-light">
				<div class="card-body">
					<div class="row"><strong><h5>Leatest Posts</h5></strong></div>
					
					<?php 
						include 'connection.php';
						$today = date('d-m-Y');
						$posts = "SELECT * From posts INNER JOIN categories ON categories.cate_id = posts.cate_id WHERE post_status = '1' AND post_date = '$today'";
						$run = mysqli_query($con,$posts);
						while($result = mysqli_fetch_assoc($run)){
							
						
					?>
					
					<div class="posts shadow bg-light">
						<h4 class="titlepost"><?php echo $result['post_title']; ?></h4>
						<span>Author: <i><?php echo $result['post_by']; ?></i></span>
						<span class="float-right">Date: <i><?php echo $result['post_date']; ?></i></span>
						<hr />
						<img src="<?php echo $result['post_thumb']; ?>" />
						<p>
							<?php  echo substr($result['post_desc'],0,150); ?>
						</p>
						<a href="single_post.php?pid=<?php echo $result['post_id']; ?>" class="btn btn-success float-right">Read More</a>
						<br /><br />
					</div>
					<?php
						}
					?>
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