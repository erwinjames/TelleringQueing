<?php
$conn = mysqli_connect('localhost','root','','sss');
if(!$conn){die('Error:' .mysqli_error($conn));}

$result=mysqli_query($conn,"select * from setnum");

while($data = mysqli_fetch_row($result))
{   
   
    echo $data[1];
   
}

?>