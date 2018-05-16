<?php
header('Content-Type: application/json');

$con = mysqli_connect("127.0.0.1","root","","iot");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{    
    $result = mysqli_query($con, "SELECT * FROM sensor ORDER BY id DESC LIMIT 1");
    
    while($row = mysqli_fetch_array($result))
    {   $json[] = array(
        'y' => $row['air']
    );
    }
    
    echo json_encode($json);
}
mysqli_close($con);
?>
