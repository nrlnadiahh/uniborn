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
				<h2 style="text-align:center" class="tm-text-shadow4" >Vehicles Details </h2>
					<?php
						include 'conn.php';
						
						$conn = OpenCon();
						
						//get page number
						$page=0;
						
						//set variable
						if(isset($_GET["page"])==true)
						{
							$page = $_GET["page"];
						}
						else
						{
							$page=0;
						}
						
						//algo for pagination in sql
						if($page=="" || $page=="1")
						{
							$page1=0;
						}
						else
						{
							$page1=($page*5)-5;
						}
						
						$sql = "select * from vehicle limit $page1,5";
						$result = $conn->query($sql);
						echo "<table style='text-align: center;
						                    font-size: 23px'>";
								echo"<tr>";
									echo "<th>Plat Number</th>";
									echo "<th>Model</th>";
									echo "<th>Mode</th>";
									echo "<th>Type</th>";
									echo "<th>Seat Capacity</th>";
									echo "<th>Price/Hour</th>";
									//echo "<th></th>";
								echo "</tr>";
								
								if($result->num_rows>0) {
									//output data of each row
									while($row=$result->fetch_assoc()) 
									{
										$platno = $row["platno"];			
										$model = $row["model"];			
										$mode = $row["mode"];
										$type = $row["type"];
										$seatcap = $row["seatcap"];
										$pricehour = $row["pricehour"];
										
										echo "<tr>";
											echo "<td>$platno</td>";
											echo "<td>$model</td>";
											echo "<td>$mode</td>";
											echo "<td>$type</td>";
											echo "<td>$seatcap</td>";
											echo "<td>$pricehour</td>";
											echo "<td style='white-space: nowrap'>" ?><button onclick="window.location.href='updatevehicledetails.php?platno=<?php echo $platno ?>'">UPDATE</button><?php "</td>";
										echo"</tr>";
									}
								}
								else 
									echo "Error in ferching data";
								echo"</table>";
								
								
								//count number of record
								
								$sql2="select count(*) FROM vehicle";
								$result = $conn->query($sql2);
								$row = $result->fetch_row();
								$count = ceil($row[0]/5);
								
								for($pageno=1;$pageno<=$count;$pageno++)
								{
									?><a href="displayvehicle.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " ";?></a>
									<?php
								}
								CloseCon($conn);
						?>
						<table>
					<tr>
					<td colspan="2" align="center">
						<input type="button" value="Back" onclick="history.back()" />
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