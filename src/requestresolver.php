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

			header("location: ../404.html");
		}
		else if($_GET["action"] === "buyfood"){
			$filehandler = fopen("buyfood.txt", "w+");
			$payments = (int) fread($filehandler);

			$payments = $payments+1;

			fwrite($filehandler, (string) $payments);
			fclose($filehandler);

			header("location: ../404.html");
		}	
		else if($_GET["action"] === "newregister"){
			if(isset($_POST["name"])
				&& isset($_POST["email"])){
				$csvfilehandler = fopen(__dir__."/../database/database.csv", "a");

				$name = $_POST["name"];
				$email = $_POST["email"];
				$creditcard = isset($_POST["creditcard"])?1:0;
				$debitcard = isset($_POST["debitcard"])?1:0;
				$cash = isset($_POST["cash"])?1:0;
				$thirdparty = isset($_POST["thirdparty"])?1:0;

				$csvdata = "$name,$email,$creditcard,$debitcard,$cash,$thirdparty,\n";

				fwrite($csvfilehandler, $csvdata);
				fclose($csvfilehandler);

				header("location: http://sinhambre.herokuapp.com/thanks.html");
			}
			else 
				header("location: ../404.html");
		}
	}

	