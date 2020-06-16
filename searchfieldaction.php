<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Kereta Sewa Abang</title>
	<?php include 'head.php';?>
	<script type="text/javascript">
			function confirmDelete(bookingid)
			{
				if(confirm('Sure To Remove This Record ?'))
				{
					window.location.href='deletebooking.php?bookingid='+bookingid;
				}
			}
		</script>

</head>

<body>
<div class="tm-bg-transparent-black tm-contact-box-pad">
    <div class="row mb-4">
		<div class="col-sm-12">
		    <section>
			<article>
				<h2 style="text-align:center" class="tm-text-shadow4" >Result of Searching </h2>
					<?php
						include 'conn.php';
						
						$conn = OpenCon();
						
						$searching = $_GET["searchfield"];

			
				//get page number
				$page = 0;

				//set variable
				if(isset($_GET["page"])==true) {
					$page = ($_GET["page"]);
				}	else {
					$page = 0;	
				}

				//algo for pagination in sql
				if ($page=="" || $page=="1"){
						$page1 = 0;
				}
				else {
					$page1= ($page*4)-4;
				}

				$sql = "select * 
						from booking b, renter r, vehicle v
						where b.renterid = r.renterid
						and b.platno = v.platno
						and (b.bookingid like '%$searching%'
						or b.bookdate like '%$searching%'
						or b.renterid like '%$searching%'
						or r.rentername like '%$searching%'
						or b.timein like '%$searching%'
						or b.timeout like '%$searching%'
						or b.status like '%$searching%'
						or b.platno like '%$searching%')
						limit $page1,4";

				$result = $conn->query($sql);

			echo "<table>";
					echo "<tr>";
					echo "<th>Booking ID</th>";
					echo "<th>Booking Date</th>";
					echo "<th>Time In</th>";
					echo "<th>Time Out</th>";
					echo "<th>Renter ID</th>";
					echo "<th>Renter Name</th>";
					echo "<th>Plat No</th>";
					echo "<th>Status</th>";
					echo "<th></th>";
				echo"</tr>";

				if($result-> num_rows > 0) {
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
						
					echo "<tr>";
						echo "<td>$bookingid</td>";
						echo "<td>$bookdate</td>";
						echo "<td>$timein</td>";
						echo "<td>$timeout</td>";
						echo "<td>$renterid</td>";
						echo "<td>$rentername</td>";
						echo "<td>$platno</td>";
						echo "<td>$status</td>";
						echo "<td style='white-space: nowrap'>" ?><button onclick="window.location.href='updatebookdetails.php?bookingid=<?php echo $bookingid ?>'">UPDATE</button>
									  <button value="Delete" onclick="confirmDelete('<?php echo $bookingid ?>')">DELETE</button><?php "</td>";
				    echo "</tr>";
					}
				}else 
					echo "Error in fetching data";
				echo "</table>";
				
				//count number of record
				if($result->num_rows > 0) {
					$sql2 = "select count(*) 
					from booking b, renter r, vehicle v
					where b.renterid = r.renterid
					and b.platno = v.platno
					and (b.bookingid like '%$searching%'
					or b.bookdate like '%$searching%'
					or b.renterid like '%$searching%'
					or r.rentername like '%$searching%'
					or b.timein like '%$searching%'
					or b.timeout like '%$searching%'
					or b.status like '%$searching%'
					or b.platno like '%$searching%')";

					$result = $conn->query($sql2);
					$row = $result ->fetch_row();
					$count = ceil($row[0]/4);
					for($pageno=1;$pageno<=$count;$pageno++){
						?><a href="searchfieldaction.php?page=<?php echo $pageno; ?>&searchfield=<?php echo $searching; ?>"
						style="text-decoration:none"> <?php echo $pageno. " "; ?></a><?php
					}
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