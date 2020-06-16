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
<div class="tm-bg-transparent-black tm-contact-box-pad">
    <div class="row mb-4">
		<div class="col-sm-12">
		    <section>
			<article>
			<h2 style="text-align:center" class="tm-text-shadow">Delete Register</h2>
				<?php

				include 'conn.php';
				$bookingid = $_GET["bookingid"];
				$conn = OpenCon();

				$sql = "delete from booking where bookingid = '$bookingid'";
				
				$result = $conn->query($sql);

				if(! $result) {
					die('Could not delete data: ' . mysqli_error());
				}
				else {
					echo "Data has been deleted";
				}

				
				CloseCon($conn);
				?>
				<table>
					<tr>
					<td colspan="2" align="center">
						<input type="button" value="Home" onclick="window.location.href='index.php'"/>
					</tr>
				</table>
			</article>
		</section>
		</div>
	</div>
</div>                            
									
				<footer class="footer-link">
                      <?php include 'footer.php'; ?>
				</footer>

	</body>
</html>