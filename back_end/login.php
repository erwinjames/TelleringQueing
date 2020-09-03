<?php
		$conn = mysqli_connect('localhost','root','','sss');
			if(!$conn){
				
				die('Error:' .mysqli_error($conn));
			
			}
			$echo = "";
			extract($_REQUEST);

			if(isset($_REQUEST['login'])){
				$SELECT_LOGIN = "SELECT * FROM tbl_account WHERE accountname = '{$accountname}' AND password = '{$password}' ";
				$query = mysqli_query($conn,$SELECT_LOGIN);
					
				if(mysqli_num_rows($query) !=0 ){
					$row = mysqli_fetch_array($query);
					if($row[3] == 1){
						echo 'login';
					}else{
						
						$UPDATE_TELLER_QUE = "
						UPDATE tbl_account SET 
						stat = 1
						WHERE id = ".$row[0]." ";
						$query = mysqli_query($conn,$UPDATE_TELLER_QUE);
						echo  $row[0];
						
					}
				}else{
					echo 'failed';
					// update log-in stat to 0
				// 	$UPDATE_TELLER_QUE = "
						// UPDATE tbl_account SET 
						// stat = 0
						// WHERE id = ".$row[0]." ";
						// $query = mysqli_query($conn,$UPDATE_TELLER_QUE);
				}
			}
?>