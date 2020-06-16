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

			<center><header><h2 class="tm-text-shadow2">Only Authorized User is Allowed!</h2></header></center>
		
	<section>
			<article>
			<?php 
			include 'conn.php';
			$conn = OpenCon();
				session_start();
				$staffid = $_POST["staffid"];
				$password = $_POST["password"];

				$sql = "SELECT * from staff WHERE staffid = '$staffid'	and password = '$password'";
				$result = $conn->query($sql);
				if($result-> num_rows > 0) {
					
					//output data of each row
					while($row = $result->fetch_assoc()){
						$_SESSION['login_user'] = $staffid;
						
						header("location: index.php");
					}
				} else {
					echo "Your Login Name or Password is invalid";
				}
				CloseCon($conn);
			?>
			</article>
		</section>

				<footer class="footer-link">
                      <?php include 'footer.php'; ?>
				</footer>

	</body>
</html>