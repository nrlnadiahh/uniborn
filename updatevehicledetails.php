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
            <h2 style="text-align:center; padding-top:30px; padding-bottom:20px" class="tm-text-shadow3" >Updating Form </h2>
				<form action="updatevehicleaction.php" id="updateform" method="POST">

				<?php
					include 'conn.php';
					$conn = OpenCon();

					
		$platno= $_GET["platno"];
		
		$sql= "select * from vehicle where platno = '$platno'";
						$result= $conn->query($sql);
						
						if($result->num_rows>0) {
							
						//output data of each row
						while($row=$result->fetch_assoc()) {
							$platno = $row["platno"];			
							$model = $row["model"];			
							$mode = $row["mode"];
							$type = $row["type"];
							$seatcap = $row["seatcap"];
							$pricehour = $row["pricehour"];
							
						}
						echo "<table>";
							echo "<tr>";
								echo "<td>Plat Number</td>";
								echo "<td>"?><input type="text" name="platno" value="<?php echo $platno;?>" readonly><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Model</td>";
								echo "<td>"?><input type="text" name="model" value="<?php echo $model;?>" ><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Mode</td>";
								echo "<td>"?><input type="text" name="mode" value="<?php echo $mode;?>" ><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Type</td>";
								echo "<td>"?><input type="text" name="type" value="<?php echo $type;?>" ><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Seat Capacity</td>";
								echo "<td>"?><input type="text" name="seatcap" value="<?php echo $seatcap;?>" ><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Price per Hour</td>";
								echo "<td>"?><input type="text" name="pricehour" value="<?php echo $pricehour;?>" ><?php "</td>";
							echo "</tr>";
						echo "</table>";	
				    
					
				}
					else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
		//	}
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