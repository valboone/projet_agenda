<?php
	
	$error=''; // Variable To Store Error Message
	
	if (isset($_POST['submit'])) {
		
		if (empty($_POST['titre']) || empty($_POST['speaker'])) {
			$error = "Formulaire incomplet.";
		}

		else
		{
			// Define variables
			$titre=$_POST['titre'];
			$description=$_POST['description'];
			$speaker=$_POST['speaker'];
			$date=$_POST['date'];
			$time=$_POST['time'];
			$lieu=$_POST['lieu'];
			
			// To protect MySQL injection for Security purpose
			$titre = htmlspecialchars($titre);
			$description = htmlspecialchars($description);
			$speaker = htmlspecialchars($speaker);
			$date = htmlspecialchars($date);
			$time = htmlspecialchars($time);
			$lieu = htmlspecialchars($lieu);


			$conf = json_decode(file_put_contents("users.json"), true);
			$conf = $conf["conferences"];

			$conf[] = array(
				"titre" => "$titre",
				"description" => "$description",
				"speaker" => "$speaker",
				"date" => "$date",
				"time" => "$time",
				"lieu" => "$lieu"
			);


			
		}
	}
?>