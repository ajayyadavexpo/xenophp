<?php pageAdd('include/header.php'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-6 pt-4">
			  <h2>Login form</h2>
			  <form action="/submit-login" method="POST">
			    <div class="form-group">
			      <label for="email">Email:</label>
			      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
			    </div>
			    <div class="form-group">
			      <label for="password">Password:</label>
			      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
			    </div>

			    <button type="submit" class="btn btn-primary">Submit</button>
			    <a href="register" class="btn btn-dark">Register</a>

			  </form>


		</div>
	</div>
</div>

<?php pageAdd('include/footer.php'); ?>