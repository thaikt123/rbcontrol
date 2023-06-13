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

			$sql = "select * from accmerch";
		$result = $conn->query($sql);

		}
		else{
			// user: select only own information
			$sql = "select * from accmerch where user = '".$_SESSION['username']."'";
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
				        <th>Acc Merch ID</th>
				        <th>User</th>
				        <th>Alias</th>
				        <th>Tier</th>
				        <th>Alive Status</th>
				        
			
				        
				    
				      </tr>
                </thead>
			    <tbody>
			    <?php

		        	if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
					    
					    echo "<tr>";
					    echo "<td>".$row["acc_merch_id"]."</td>";
			        	echo "<td>".$row["user"]."</td>";
			        	echo "<td>".$row["alias"]."</td>";
			        	echo "<td>".$row["tier"]."</td>";
			        	echo "<td>".$row["alive_status"]."</td>";
			        				        	
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
		    <h2 text-align="center"> Category</h2>
		    <?php include "../includes/right.php" ?>
		</div>
        
    </main>


<?php $conn->close(); ?>
<?php include "../includes/footer.php" ?>
