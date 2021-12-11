<?php
	$User_Name  =$_POST['User_Name'];
	$Password   =$_POST['Password'];
	$First_Name =$_POST['First_Name'];
	$Last_Name  =$_POST['Last_Name'];
	$Location   =$_POST['Location'];
	$Food       =$_POST['Food'];
	$Allergies  =$_POST['Allergies'];
	$Text       =$_POST['Text'];
	
	//Hashing Password
	$Hash_Pass=password_hash($Password, PASSWORD_DEFAULT);
	
	//Database Connection
	$conn = new mysqli('localhost','root','','servingsoul_reg');
	if($conn->connect_error){
		die('Connection Failed :'.$conn->connect_error);
	}else{
			$stmt=$conn->prepare("insert into registration(User_Name, Password, First_Name, Last_Name, Location, Food, Allergies, Text)
				value(?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssssssss",$User_Name,$Hash_Pass, $First_Name, $Last_Name, $Location, $Food, $Allergies, $Text);
            $stmt->execute();
			echo "Joined Successfully...";
			sleep(2);
			$stmt->close();
			$conn->close();
			header("Location: Reg_Successful.html");
	}
?>