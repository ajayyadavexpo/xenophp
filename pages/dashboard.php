<?php pageAdd('include/header.php'); ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-6 pt-4">
			  <h2>User Dashboard</h2>
				<?php echo $name; ?>
				
			  <a href="logout" class="btn btn-dark btn-sm">Logout</a>

			 <!--  <?php foreach($user_posts as $post){?>

			  	<div class="card p-4">
			  		<h3><a href="posts/<?php echo $post['id'];?>"><?php echo $post['title']; ?></a></h3>
			  		<p><?php echo $post['content'];?></p>

			  	</div>

			  <?php } ?> -->

		</div>
	</div>
</div>

<?php pageAdd('include/footer.php'); ?>