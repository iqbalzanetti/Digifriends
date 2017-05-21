<?php include('header.php'); ?>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form method="POST" action="">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Enter number</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Number" name="numb" value="<?php  if(isset($_POST['numb']))echo($_POST['numb']?$_POST['numb']:'') ?>">
			  </div>
			  <button type="submit" class="btn btn-default pull-right" name="find_number">Submit</button>
			</form>
		</div>
	</div>

	<?php
	if(isset($_POST['find_number'])){
		$entered_num = $_POST['numb'];
		$newdigi = array();
		/*echo '<div class="row"><div class="col-md-6 col-md-offset-3"><span class="page-header">Digi Friends</span><ul class="list-group">';*/
		for($i=1;$i<=$entered_num;$i++){

			if($i%3 == 0 && $i%5 == 0){
				$newnumb = $i + $i * 3 * 5 * ROUND(SQRT($entered_num)) + 2;
				array_push($newdigi, $newnumb);
			}else{
				if($i%3 == 0){
					$newnumb = $i + $i * $entered_num;
					array_push($newdigi, $newnumb);		
				}else if($i%5 == 0){
					$newnumb = $i + $i * ROUND(SQRT($entered_num)) + 1;
					array_push($newdigi, $newnumb);
				}
			}
		}
		sort($newdigi);
		$clength = count($newdigi);
		echo '<div class="row"><div class="col-md-6 col-md-offset-3"><span class="page-header">Digi Friends</span><ul class="list-group">';
		for($x = 0; $x < $clength; $x++) {
		   echo '<li class="list-group-item">'.$newdigi[$x].'</li>';
		}
		echo '</ul></div></div>';
		$serial_data = implode(',',$newdigi);

		$sql = "INSERT INTO digi_calculation (entered_num, digi_friends)
				VALUES ('$entered_num', '$serial_data')";
		$conn->query($sql);

	}


include('footer.php');
?>



