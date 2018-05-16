<?php
 require_once 'core/init.php';
$email=$_POST['email'];
$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$postalCode=$_POST['postalCode'];
$aboutMe=$_POST['aboutMe'];
$query = "UPDATE users SET email='$email', full_name='$fname', address='$address', city='$city', country='$country', postalCode='$postalCode', aboutMe='$aboutMe' WHERE id='$user_id'";
    if (mysqli_query($db, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($db);
}
header('location: user.php');
?>