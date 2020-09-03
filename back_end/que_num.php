<?php
	$conn = mysqli_connect('localhost','root','','sss');
    if(!$conn){die('Error:' .mysqli_error($conn));}
  
    extract($_REQUEST);
    if(isset($_REQUEST['next_btn'])){


		if($teller_id == 4){
			$UPDATE_TELLER_QUE = "
			UPDATE tbl_teller SET 
			next_c = $getNEXTNUM , 
			current_num = $getNEXTNUM
			WHERE teller_id = 4 ";
			$query = mysqli_query($conn,$UPDATE_TELLER_QUE);
			echo 1;
			
			$INSERTING_HISTORY_DATA = "INSERT INTO tbl_history SET teller_id=$teller_id , date_time=now()";
					if(mysqli_query($conn,$INSERTING_HISTORY_DATA)){
						 echo "success";
					}
					else{
						echo "failed";
					}


		}
		
		else{
    	$UPDATE_TELLER_QUE = "
    	UPDATE tbl_teller SET 
    	next_c = $getNEXTNUM , 
    	current_num = $getNEXTNUM
    	WHERE teller_id = $teller_id ";
    	$query = mysqli_query($conn,$UPDATE_TELLER_QUE);
		echo 1;
		
		$INSERTING_HISTORY_DATA = "INSERT INTO tbl_history SET teller_id=$teller_id , date_time=now()";
				if(mysqli_query($conn,$INSERTING_HISTORY_DATA)){
				     echo "success";
				}
				else{
					echo "failed";
				}

	}
}
	
?>