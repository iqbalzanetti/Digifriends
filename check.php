<?php include('header.php'); ?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form method="POST" action="">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <label for="exampleInputEmail1">Enter first number</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Number" name="first_num" value="<?php  if(isset($_POST['first_num']))echo($_POST['first_num']?$_POST['first_num']:'') ?>" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    <label for="exampleInputEmail1">Enter second number</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Number" name="second_num" value="<?php  if(isset($_POST['second_num']))echo($_POST['second_num']?$_POST['second_num']:'') ?>" required>
					</div>
				</div>
			</div>
		  
		  <button type="submit" class="btn btn-default pull-right" name="check_number">Check</button>
		</form>
	</div>
</div>


<?php
if(isset($_POST['check_number'])){
	$f_num = $_POST['first_num'];
	$s_num = $_POST['second_num'];

	if(!is_numeric($f_num)){
		echo '<div class="row myalert"><div class="col-md-6 col-md-offset-3"><div class="alert alert-danger">
		  <strong>Please Enter Numeric Values</strong>
		</div></div></div>';

		exit();
	}

	if(!is_numeric($s_num)){
		echo '<div class="row myalert"><div class="col-md-6 col-md-offset-3"><div class="alert alert-danger">
		  <strong>Please Enter Numeric Values</strong>
		</div></div></div>';

		exit();
	}

	$sec_number = 0;
	$first_number = 0;
	$newdigi = array();
	//check first number
	for($i=1;$i<=$f_num;$i++){
		if($i%3 == 0 && $i%5 == 0){
			$newnumb = $i + $i * 3 * 5 * ROUND(SQRT($f_num)) + 2;
			array_push($newdigi, $newnumb);
			if (in_array($s_num, $newdigi)){
				$sec_number = 1;
				break;
			}
		}else{
			if($i%3 == 0){
				$newnumb = $i + $i * $f_num;
				array_push($newdigi, $newnumb);	
				if (in_array($s_num, $newdigi)){
					$sec_number = 1;
					break;
				}
			}else if($i%5 == 0){
				$newnumb = $i + $i * ROUND(SQRT($f_num)) + 1;
				array_push($newdigi, $newnumb);
				if (in_array($s_num, $newdigi)){
					$sec_number = 1;
					break;
				}
			}
		}
	}

	//check second number
	for($i=1;$i<=$s_num;$i++){
		if($i%3 == 0 && $i%5 == 0){
			$newnumb = $i + $i * 3 * 5 * ROUND(SQRT($s_num)) + 2;
			array_push($newdigi, $newnumb);
			if (in_array($f_num, $newdigi)){
				$first_number = 1;
				break;
			}
		}else{
			if($i%3 == 0){
				$newnumb = $i + $i * $s_num;
				array_push($newdigi, $newnumb);	
				if (in_array($f_num, $newdigi)){
					$first_number = 1;
					break;
				}
			}else if($i%5 == 0){
				$newnumb = $i + $i * ROUND(SQRT($s_num)) + 1;
				array_push($newdigi, $newnumb);
				if (in_array($f_num, $newdigi)){
					$first_number = 1;
					break;
				}
			}
		}
	}

	if($sec_number == 1)
		echo '<div class="row myalert"><div class="col-md-6 col-md-offset-3"><div class="alert alert-success">
		  <strong>'.$s_num .' is Digifriend of '. $f_num .'</strong>
		</div></div></div>';
	else
		echo '<div class="row myalert"><div class="col-md-6 col-md-offset-3"><div class="alert alert-danger">
		  <strong>'.$s_num .' is not Digifriend of '. $f_num .'</strong>
		</div></div></div>';


	if($first_number == 1)
		echo '<div class="row myalert"><div class="col-md-6 col-md-offset-3"><div class="alert alert-success">
		  <strong>'.$f_num .' is Digifriend of '. $s_num .'</strong>
		</div></div></div>';
		
	else
		echo '<div class="row myalert"><div class="col-md-6 col-md-offset-3"><div class="alert alert-danger">
		  <strong>'.$f_num .' is not Digifriend of '. $s_num .'</strong>
		</div></div></div>';

}

include('footer.php'); ?>