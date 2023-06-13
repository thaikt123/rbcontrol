<?php session_start(); ?>
<?php require_once("../includes/connection.php"); ?>
<?php include "../includes/header.php" ?>
<?php 
   if (isset($_SESSION['username']) && $_SESSION['username']){
       echo '<a href="../index.php"> User Name:  '.$_SESSION['username'].'</a>'."<br/>";
       echo '<a href="../logout.php">Logout</a>'."<br/>"; 

       $role_sql = "select role from user where user = '".$_SESSION['username']."'";
		$role_result = $conn->query($role_sql);
		$data_role = $role_result->fetch_assoc();

		if($data_role["role"] == "admin"){

			// admin: select all User

			$sql = "select * from merchdataup";
		$result = $conn->query($sql);

		}
		else{
			// user: select only own information
			$sql = "select * from merchdataup where user = '".$_SESSION['username']."'";
			$result = $conn->query($sql);

		}

	}
   else{
       echo 'Bạn chưa đăng nhập';
       header('Location: login.php');
   }


?>	

    <main>
        <div class="table-container">
            <table>
            	<thead>
	                <tr>
				        <th>Design Png</th>
				        <th>Price</th>
				        <th>Product Type</th>
				        <th>Color</th>
				        <th>Brand</th>
				        <th>Title</th>
				        <th>Bullet 1</th>
				        <th>Bullet 2</th>
				        <th>Description</th>
				        <th>Is Men</th>
				        <th>Is Women</th>
				        <th>Is Youth</th>
				        <th>Is Upload</th>
				        <th>Tag</th>
				        <th>Root Asin</th>
				        <th>Acc Merch ID</th>
				        <th>User</th>
				        
				    
				      </tr>
                </thead>
			    <tbody>
			    <?php

		        	if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
					    
					    echo "<tr>";
					    echo "<td>".$row["url_png"]."</td>";
			        	echo "<td>".$row["price"]."</td>";
			        	echo "<td>".$row["product_type"]."</td>";
			        	echo "<td>".$row["color"]."</td>";
			        	echo "<td>".$row["brand"]."</td>";
			        	echo "<td>".$row["title"]."</td>";
			        	echo "<td>".$row["bullet1"]."</td>";
			        	echo "<td>".$row["bullet2"]."</td>";
			        	echo "<td>".$row["description"]."</td>";
			        	echo "<td>".$row["is_men"]."</td>";
			        	echo "<td>".$row["is_women"]."</td>";
			        	echo "<td>".$row["is_youth"]."</td>";
			        	echo "<td>".$row["is_Upload"]."</td>";
			        	echo "<td>".$row["tag"]."</td>";
			        	echo "<td>".$row["root_asin"]."</td>";
			        	echo "<td>".$row["acc_merch_id"]."</td>";
			        	echo "<td>".$row["user"]."</td>";
			        	echo "</tr>";

					  }
					} else {
					  echo "0 results";
					}
		    	?>

			    </tbody>

            </table>
        </div>

        <div class="sidebar">
		    <h2>Category.</h2>
		    <?php include "../includes/right.php" ?>
		</div>
        
    </main>


<?php $conn->close(); ?>
<?php include "../includes/footer.php" ?>
