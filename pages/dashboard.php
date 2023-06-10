<?php pageAdd('include/header.php'); ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-6 pt-4">
			  <h2>User Dashboard</h2>
				<?php echo $_SESSION['user_name']; ?>
				
			  <a href="logout" class="btn btn-dark btn-sm">Logout</a>

		</div>
	</div>
</div>

<?php pageAdd('include/footer.php'); ?>