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
			<h2 style="text-align:center" class="tm-text-shadow3" >Updating Form </h2>
				<form action="updatebookaction.php" id="updateform" method="POST">

				<?php
					include 'conn.php';
					$conn = OpenCon();

					$bookingid = $_GET["bookingid"];

					$sql = "select * 
							from booking b, renter r, vehicle v
							where b.renterid = r.renterid
							and b.platno = v.platno
							and bookingid = '$bookingid'";

					$result = $conn->query($sql);
					if($result-> num_rows> 0) {
						//output data of each row
						while($row = $result->fetch_assoc()){
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
								echo "<td>"?><input type="text" name="bookingid" value="<?php echo $bookingid;?>" readonly><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Booking Date</td>";
								echo "<td>"?><input type="date" name="bookdate" value="<?php echo $bookdate;?>" ><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Time In</td>";
								echo "<td>"?><input type="time" name="timein" value="<?php echo $timein;?>" ><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Time Out</td>";
								echo "<td>"?><input type="time" name="timeout" value="<?php echo $timeout;?>" ><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Renter ID</td>";
								echo "<td>"?><input type="text" name="renterid" value="<?php echo $renterid;?>" readonly><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Renter Name</td>";
								echo "<td>"?><input type="text" name="rentername" value="<?php echo $rentername;?>" readonly><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Plat No</td>";
								echo "<td>"?><input type="text" name="platno" value="<?php echo $platno;?>"><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Status </td>";
								echo "<td>"?><input type="text" name="status" value="<?php echo $status;?>" ><?php "</td>";
							echo "</tr>";
							echo "</table>";
						}
					} else {
						echo "Data cannot be displayed";
					}
					CloseCon($conn);
					?>
					<br>
					<table>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="Submit">
							<input type="button" value="Back" onclick="history.back()"/>
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