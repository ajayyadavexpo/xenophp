<?php pageAdd('include/header.php'); ?>


<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-6 pt-4">
			  <h2>Register form</h2>
			  <form action="submit-register" method="POST">
			    <div class="form-group">
			      <label for="name">Name:</label>
			      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
			    </div>
			    <div class="form-group">
			      <label for="email">Email:</label>
			      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
			    </div>
			    
			    <div class="form-group">
			      <label for="password">Password:</label>
			      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
			    </div>

			    <button type="submit" class="btn btn-primary">Submit</button>
			    <a href="login" class="btn btn-dark">Login</a>
			  </form>


		</div>
	</div>
</div>

<?php pageAdd('include/footer.php'); ?>