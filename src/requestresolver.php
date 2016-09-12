<?php
	
	//check the user action
	if(isset($_GET["action"])){
		if($_GET["action"] === "reservation"){
			$filehandler = fopen("reservation.txt", "w+");

			//get the number of reservations
			$reservations = (int) fread($filehandler);

			$reservations = $reservations+1;

			//increment the counter and override the file
			fwrite($filehandler, (string) $reservations);

			fclose($filehandler);
		}
		else if($_GET["action"] === "buyfood"){
			$filehandler = fopen("buyfood.txt", "w+");
			$payments = (int) fread($filehandler);

			$payments = $payments+1;

			fwrite($filehandler, (string) $payments);
			fclose($filehandler);
		}	
	}

	header("location: ../404.html");