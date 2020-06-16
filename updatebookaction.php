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
			<h2 style="text-align:center" class="tm-text-shadow3" >Updated Data </h2>
				<?php
					$bookingid = $_POST["bookingid"];
					$bookdate = $_POST["bookdate"];
					$timein = $_POST["timein"];
					$timeout = $_POST["timeout"];
					$platno = $_POST["platno"];
					$status = $_POST["status"];

					include 'conn.php';
					$conn = OpenCon();

				$sql = "update booking 
						set bookdate = '$bookdate',
							timein = '$timein',
							timeout = '$timeout',
							platno = '$platno',
							status = '$status'
						where bookingid = '$bookingid';";

						$result = $conn->query($sql);
						if ($result == true) {
							
							$sql2 = "select * 
									from booking b, renter r, vehicle v
									where b.renterid = r.renterid
									and b.platno = v.platno
									and bookingid = '$bookingid'";

							$result2= $conn->query($sql2);
							if($result2-> num_rows> 0) {
								//output data of each row
								while($row = $result2->fetch_assoc()){

									$bookingid = $row["bookingid"];
									$bookdate =$row["bookdate"];	
									$timein = $row["timein"];
									$timeout = $row["timeout"];
									$renterid = $row["renterid"];
									$rentername = $row["rentername"];
									$platno =$row["platno"];
									$status =$row["status"];

									echo "<table>";
									echo "<tr>";
										echo "<td>Booking ID</td>";
										echo"<td>$bookingid</td>";
									echo"</tr>";
									echo "<tr>";
										echo "<td>Booking Date</td>";
										echo"<td>$bookdate</td>";
									echo"</tr>";
									echo "<tr>";
										echo "<td>Time In</td>";
										echo"<td>$timein</td>";
									echo"</tr>";
									echo "<tr>";
										echo "<td>Time Out</td>";
										echo"<td>$timeout</td>";
									echo"</tr>";
									echo "<tr>";
										echo "<td>Renter ID</td>";
										echo"<td>$renterid</td>";
									echo"</tr>";
									echo "<tr>";
										echo "<td>Renter Name</td>";
										echo"<td>$rentername</td>";
									echo"</tr>";
									echo "<tr>";
										echo "<td>Plat No</td>";
										echo"<td>$platno</td>";
									echo"</tr>";echo "<tr>";
									echo "<td>Status</td>";
									echo"<td>$status</td>";
								echo"</tr>";

									
								echo "</table>";
								}
							} else {
								echo "Data cannot be displayed";
							}
						}	else {
							echo "Error: " .$sql . "<br>" . mysqli_error($conn);
					}
					    CloseCon($conn);
						?>
						<table>
						<tr>
							<td colspan="2" align="center">
							<input type="button" value="Home" onclick="window.location.href='index.php'"/>
							</td>
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