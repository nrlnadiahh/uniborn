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
						$platno = $_POST["platno"];
						$model = $_POST["model"];
						$mode = $_POST["mode"];
						$type = $_POST["type"];
						$seatcap = $_POST["seatcap"];
						$pricehour = $_POST["pricehour"];

					include 'conn.php';
					$conn = OpenCon();

				$sql = "update vehicle
						set model='$model',
						mode = '$mode',
						type = '$type',
						seatcap = '$seatcap',
						pricehour = '$pricehour'
						where platno = '$platno';";

						$result = $conn->query($sql);
						if ($result == true) {
							
							$sql2 = "select * from vehicle where platno = '$platno'";
			
			$result= $conn->query($sql2);
						
						if($result->num_rows>0) {
							
							while($row=$result->fetch_assoc()) {
							$platno = $row["platno"];			
							$model = $row["model"];			
							$mode = $row["mode"];
							$type = $row["type"];
							$seatcap = $row["seatcap"];
							$pricehour = $row["pricehour"];
							
						
						echo "<table>";
							echo "<tr>";
								echo "<td>Plat Number</td>";
								echo "<td>$platno</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Model</td>";
								echo "<td>$model</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Mode</td>";
								echo "<td>$mode</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Type</td>";
								echo "<td>$type</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Seat Capacity</td>";
								echo "<td>$seatcap</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Price per Hour</td>";
								echo "<td>$pricehour</td>";
							echo "</tr>";
						echo "</table>";	
					}
					
				}
				else {
					echo"data cannot be displayed";
				}
				}
					else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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