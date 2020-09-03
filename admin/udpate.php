<?php
$conn = mysqli_connect('localhost','root','','sss');
if(!$conn){die('Error:' .mysqli_error($conn));}
if(isset($_POST['submit']))
$setNum=$_POST['sets'];
$sql = "UPDATE setnum SET set_num=$setNum WHERE id=1";

if (mysqli_query($conn, $sql)) {
  header("location:que_limit.php");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>