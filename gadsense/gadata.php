<?php session_start(); ?>
<?php require_once("../includes/connection.php"); ?>
<?php include "../includes/header.php" ?>
<?php 
   if (isset($_SESSION['username']) && $_SESSION['username']){
       echo '<a href="../index.php"> User Name:  '.$_SESSION['username'].'</a>'."<br/>";
       echo '<a href="../logout.php">Logout</a>'."<br/>"; 

       // 	
		// Phan quyen :
       	// admin: select all
       	// user" select where ...
        // 
       	$role_sql = "select role from user where user = '".$_SESSION['username']."'";
       	$role_result = $conn->query($role_sql);
       	$data_role = $role_result->fetch_assoc();

       	// Check user is Admin or Normal
       	if($data_role["role"] == "admin"){

       		// admin: select all User

       		$sql = "select * from user";
			$result = $conn->query($sql);


			// admin: select all User Data
			$sql2 = "select * from data";



       	}
       	else{
       		// user: select only own information
       		$sql = "select * from user where user = '".$_SESSION['username']."'";
			$result = $conn->query($sql);

			// user: select only own Data
			$sql2 = "select * from data where user = '".$_SESSION['username']."'";

       	}


   }
   else{
       echo 'Bạn chưa đăng nhập';
       header('Location: login.php');
   }


?>
	<main>
		
    	<div class="table-container">
    		<h3>List Data GA-WP</h3>
            <table>
            	<thead>
	                <tr>
				        <th>ID Data</th>
				        <th>User</th>
				        <th>Thumbnail</th>
				        <th>Vercel</th>
				        <th>Descript</th>
				        <th>Facebook Page</th>
				        <th>Niche/Tag</th>
				        <th>Post Status</th>
				        
				    
				      </tr>
                </thead>
			    <tbody>
			    <?php

		        	$result2 = $conn->query($sql2);
		    		if ($result2->num_rows > 0) {
					  // output data of each row
					  while($row2 = $result2->fetch_assoc()) {
					    
					    echo "<tr>";
					    echo "<td>".$row2["id"]."</td>";
			        	echo "<td>".$row2["user"]."</td>";
			        	echo "<td>".$row2["thumb_link"]."</td>";
			        	echo "<td>".$row2["vercel_link"]."</td>";
			        	echo "<td>".$row2["descript"]."</td>";
			        	echo "<td>".$row2["fb_page"]."</td>";
			        	echo "<td>".$row2["niche_tag"]."</td>";
			        	echo "<td>".$row2["post_status"]."</td>";

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