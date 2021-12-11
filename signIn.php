<?php
	$User_Name  =$_POST['User_Name'];
	$Password   =$_POST['Password'];
	
	//Database connection
	$conn = new mysqli('localhost','root','','servingsoul_reg');
	if($conn->connect_error){
		die('Connection Failed :'.$conn->connect_error);
	}else{
			$stmt=$conn->prepare("SELECT * from registration where User_Name = ?");
			$stmt->bind_param("s",$User_Name);
            $stmt->execute();
			$stmt_result= $stmt->get_result();
			if($stmt_result->num_rows>0){
				$data = $stmt_result->fetch_assoc();
				if(password_verify($Password,$data['Password'])){
					echo "Login Successfully";
					header("Location: index.html");
				}else{
					echo "Invaild Username/Password";
				}
			}else {
				echo "Both Username/Password not found";
			}
	}
?>