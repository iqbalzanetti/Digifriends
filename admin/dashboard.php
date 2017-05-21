<?php
	include '../header.php';
	if($_SESSION['uid'] == ''){
		header('location:index.php');
	}
?>

<div class="container">
	<div class="row deletebtn">
		<div class="col-md-12">
			<a href="<?php echo $base_url ?>admin/delete.php" class="btn btn-danger pull-right" onclick="return confirm('Are you sure you want to delete all items?');">Delete All</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover">
		      <thead>
		        <tr>
		          <th>S.no</th>
		          <th>Number</th>
		          <th>DigiFriends</th>
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      	$sql = "SELECT * FROM digi_calculation";
				$result = $conn->query($sql);
				$i = 1;
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
		      ?>
		        <tr>
		          <td><?php echo $i; ?></td>
		          <td><?php echo $row['entered_num']; ?></td>
		          <td><?php echo $row['digi_friends']; ?></td>
		        </tr>
		      <?php 
		      	$i++;
		  			} 
		      	}else{
		      		echo '<td class="text-center" colspan=3>No records found!!</td>';
		      	} ?>
		      </tbody>
		    </table>
	    </div>
    </div>
</div>