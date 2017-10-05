<?php
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	
	if (isset($_POST['submit'])) {
		
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		}

		else
		{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			//$connection = mysql_connect("localhost", "root", "");
			// To protect MySQL injection for Security purpose
			$username = htmlspecialchars($username);
			$password = htmlspecialchars($password);


			$users = json_decode(file_get_contents("users.json"), true);
			$users = $users["users"];


			$i=0;
			$trouve=false;


			while (!$trouve && $i<count($users)) {
				$trouve = $users[$i]["name"] == $username;
				++$i;
			}

			if ($trouve) {
				if ($users[$i-1]["password"] == $password) {
					$connect=1;
				}				
			}

			// if ($username=="admin" && $password=="admin") {
			// 	$connect=1;
			// }
			
			//$username = mysql_real_escape_string($username);
			//$password = mysql_real_escape_string($password);
			// Selecting Database
			//$db = mysql_select_db("company", $connection);
			// SQL query to fetch information of registerd users and finds user match.
			//$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
			//$rows = mysql_num_rows($query);
			
			if ($connect == 1) {
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: index.php"); // Redirecting To Other Page
			} 

			else {
				echo "Username or Password is invalid";
			}

			//mysql_close($connection); // Closing Connection
		}
	}
?>