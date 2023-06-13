
<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php include "includes/indexheader.php" ?>

<?php 
   if (isset($_SESSION['username']) && $_SESSION['username']){
       echo 'User Name:  '.$_SESSION['username']."<br/>";
       echo '<a href="logout.php">Logout</a>'."<br/>"; 

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
            
            <h2>Welcome to GA - Merch Manager System</h2>
        </div>

        <div class="sidebar">
		    <h2>Category.</h2>
		    <?php include "includes/indexright.php" ?>
		</div>
        
    </main>	

		


<?php $conn->close(); ?>
<?php include "includes/footer.php" ?>