<?php
		//address of the server where db is installed
		$servername = "localhost";
		//username to connect to the db
		//the default value is root
		$username = "root";
		//password to connect to the db
		//this is the value you would have specified during installation of WAMP stack
		$password = "";
		//name of the db under which the table is created
		$dbName = "iot";
		//establishing the connection to the db.
		$conn = new mysqli($servername, $username, $password, $dbName);
		//checking if there were any error during the last connection attempt
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		//the SQL query to be executed
		//storing the result of the executed query
		$result = mysqli_query($conn, "SELECT * FROM sensor ORDER BY id DESC LIMIT 6");
		//initialize the array to store the processed data
		$jsonArray = array();
		//check if there is any data returned by the SQL Query
		
		  //Converting the results into an associative array
		  while($row = mysqli_fetch_assoc($result)){
            $timeStamp=$row['currentTime'];
            $arr=explode(" ",$timeStamp);
            $date=$arr[0];
            $time=$arr[1];  
		    $jsonArrayItem = array();
		    $jsonArrayItem['date'] = $date;
		    $jsonArrayItem['time'] = $time;
            $jsonArrayItem['air'] = $row['air'];
		    //append the above created object into the main array.
		    array_push($jsonArray, $jsonArrayItem);
          }
		//Closing the connection to DB
		$conn->close();
		//set the response content type as JSON
		header('Content-type: application/json','charset="utf-8"');
		//output the return value of json encode using the echo function. 
		echo json_encode($jsonArray);
	?>