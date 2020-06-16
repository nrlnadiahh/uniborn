<!-- <header class="mb-4"><h2 class="tm-text-shadow">Our Products</h2></header>		            
<div class="tm-img-container">
								<div class="tm-img-slider">
									<a href="img/gallery-img-01.jpg" class="tm-slider-img"><img src="img/gallery-img-01-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-02.jpg" class="tm-slider-img"><img src="img/gallery-img-02-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-03.jpg" class="tm-slider-img"><img src="img/gallery-img-03-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-04.jpg" class="tm-slider-img"><img src="img/gallery-img-04-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-05.jpg" class="tm-slider-img"><img src="img/gallery-img-05-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-06.jpg" class="tm-slider-img"><img src="img/gallery-img-06-tn.jpg" alt="Image" class="img-fluid"></a>
								</div>
                            </div>	-->
<div class="tm-bg-transparent-black tm-contact-box-pad">
    <div class="row mb-4">
		<div class="col-sm-12">
			<h2 class="tm-text-shadow2"><b>List of Bookings</b></h2>
			<br>
			
            <?php
				include 'conn.php';
				$conn = OpenCon();
				

				$sql = "select * 
						from booking b, renter r, vehicle v
						where b.renterid = r.renterid
						and b.platno = v.platno
						order by bookdate desc";

				$result = $conn ->query($sql);
              
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

				
				CloseCon($conn);
				?>
	
			</article>
		</div>
	</div>
</div>                            