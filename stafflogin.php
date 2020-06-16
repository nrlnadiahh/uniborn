<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Kereta Sewa Abang</title>
	<?php include 'head.php';?>
</head>

<body>
			<center><header><h2 class="tm-text-shadow6">Only Authorized User is Allowed!</h2></header></center>
		
	<section  class="tm-sectionS">
			<div class="tm-bg-transparent-black tm-contact-box-pad">
   				 <div class="row mb-4">
					<div class="col-sm-12">
						<center><h2 class="tm-text-shadow7">Login</h2></center>
					</div>
				</div>
			<div class="contact_message">
				<form action="staffloginaction.php" id="form" method="POST">
					<div class="form-group">
						<input type="text"  name="staffid" class="form-control" placeholder="Staff ID" required>
					</div>
					<div class="form-group">
						<input type="password"  name="password" class="form-control" placeholder="Password" required>
					</div>
				
					<br>
					<center>
					<input type="submit" value="Login">
				    <input type="reset" value="Reset"> </center>
			</form>
      </div>
</div>
</section>

				<footer class="footer-link">
                      <?php include 'footer.php'; ?>
				</footer>

	</body>
</html>