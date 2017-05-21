<?php
	include '../header.php';
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form method="POST" action="">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="uemail">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="upass">
		  </div>
		  <button type="submit" class="btn btn-default pull-right" name="login">Submit</button>
		</form>
	</div>
</div>

<?php
if(isset($_POST['login'])){
	$email = $_POST['uemail'];
	$pass = md5($_POST['upass']);

	$sql = "SELECT * FROM admin where email='$email' AND password='$pass' ";
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
		while($row = $result->fetch_assoc()) {
			$_SESSION['uid'] = $row['id'];
			$_SESSION['uemail'] = $row['email'];
			$_SESSION['success'] = 'Login Successfully!!';
			
			header('location:dashboard.php');
		}
	}else{
		$_SESSION['unsuccess'] = 'Please check credentials and try again !!';
	}
}
	
?>
