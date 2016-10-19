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
		else if($_GET["action"] === "newregister"){
			if(isset($_POST["name"])
				&& isset($_POST["email"])
				&& isset($_POST["paymenttype"])){
				$csvfilehandler = fopen(__dir__."/../database/database.csv", "a");

				$name = $_POST["name"];
				$email = $_POST["email"];
				$paymenttype = $_POST["paymenttype"];

				$csvdata = "$name,$email,$paymenttype,\n";

				fwrite($csvfilehandler, $csvdata);
				fclose($csvfilehandler);
				header("location: ../index.html");
			}
		}
	}

	header("location: ../404.html");