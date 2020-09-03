<?php
    $conn = mysqli_connect('localhost','root','','sss');
    if(!$conn){die('Error:' .mysqli_error($conn));}
    $echo = "";
    extract($_REQUEST);
    // teller
    if(isset($_REQUEST['getque'])){
    	$SELECT_QUE = "SELECT * FROM tbl_teller";
    	$query = mysqli_query($conn,$SELECT_QUE);
        if(mysqli_num_rows($query) !=0 ){
            while($row = mysqli_fetch_array($query)){
            	$echo .= '<div class="counter">
			            <div><label>Teller : '.$row['teller_id'].'</label></div>
			            <div><label>Priority : '.$row['current_num'].'</label></div> 
			              </div>';
		// 
            }
            echo $echo;
            $SELECT_DESC = "SELECT * FROM tbl_teller where teller_id!=4 ORDER BY current_num DESC LIMIT 1";
		    $query = mysqli_query($conn,$SELECT_DESC);
		   while($row = mysqli_fetch_array($query)){
				echo '<div class="vie">
					            <div class="mar">
					            <div><label>Priority Number</label></div> 
					            <label>'.$row['current_num'].'</label>
					            <div><label>Please Proceed To</label></div>
					            <div class="">
					                <label>Teller '.$row['teller_id'].'</label>
					            </div>
					           </div>
					        </div>';
						}
						$SELECT_DESC = "SELECT * FROM tbl_teller where teller_id=4 ORDER BY current_num DESC LIMIT 1";
						$query = mysqli_query($conn,$SELECT_DESC);
					   while($row = mysqli_fetch_array($query)){
							echo '<div class="view">
											<div class="mar1">
											<div><label>PRG/PWD/SR</label></div> 
											<div><label>Priority Number</label></div> 
											<label> <h1 class="bigger">'.$row['current_num'].'</h1></label>
											<div><label>Please Proceed To</label></div>
											<div class="">
												<label><h1 class="bigger">Teller '.$row['teller_id'].'</h1></label>
											</div>
										   </div>
										</div>';
									}
							
			
        }
    }
	// end

     if(isset($_REQUEST['getNEXTQUES'])){
			
		     if($teller_id==4){

				$SELECT_NEXT = mysqli_query($conn,"SELECT * FROM tbl_teller where teller_id = 4 ORDER BY current_num DESC LIMIT 1");
				// $query = mysqli_query($conn,$SELECT_NEXT);
				$rowing=mysqli_fetch_array($SELECT_NEXT);
				$select_limitNum = mysqli_query($conn,"SELECT * FROM setnum");
				// $qery = mysqli_qeury($conn,$select_limitNum);
				$row=mysqli_fetch_array($select_limitNum);
				if($rowing['current_num']>$row['set_num'])
				{
						echo "failed";
				}
				else {
					echo $rowing[2];
					
				}

			 }
			 else
			 {

				$SELECT_NEXT = mysqli_query($conn,"SELECT * FROM tbl_teller ORDER BY current_num DESC LIMIT 1");
				// $query = mysqli_query($conn,$SELECT_NEXT);
				$rowing=mysqli_fetch_array($SELECT_NEXT);
				$select_limitNum = mysqli_query($conn,"SELECT * FROM setnum");
				// $qery = mysqli_qeury($conn,$select_limitNum);
				$row=mysqli_fetch_array($select_limitNum);
				if($rowing['current_num']>$row['set_num'])
				{
						echo "failed";
				}
				else {
					echo $rowing[2];
					
				}
			 }
        
			
			// $Scanning_printed=mysqli_query($conn,"SELECT * FROM tbl_teller t1, printed_numbers t2 WHERE t1.current_num=t2.print_num GROUP BY t2.print_num");
		  
			// $scans=mysqli_fetch_array($Scanning_printed); 
			
			// elseif($scans==true)
			// {
			// 	// echo $rowing[2];
			// 	echo $scans['current_num'];	
				
			// }
			
		
			// 
			// echo mysqli_fetch_array($query)[2];
		
    }
?>