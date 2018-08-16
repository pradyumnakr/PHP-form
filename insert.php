<!DOCTYPE html>
<html>
<head>
	<title>Forms</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php
	readfile('navigation.tmpl.html');

	$name='';
	$password='';
	$gender='';
	$tc='';
	$color='';
	$comments='';
	$languages=array( );


		if(isset($_POST['submit'])){
			$ok=true;
			if(!isset($_POST['name']) || $_POST['name'] === ''){
				$ok=false;
			}else{
				$name=$_POST['name'];
			}

			if(!isset($_POST['password']) || $_POST['password'] === ''){
				$ok=false;
			}else{
				$password=$_POST['password'];
			}
			
			
			if(!isset($_POST['gender']) || $_POST['gender'] === ''){
				$ok=false;
			}else{
				$gender=$_POST['gender'];
			}
			
			if(!isset($_POST['color']) || $_POST['color'] === ''){
				$ok=false;
			}else{
				$color=$_POST['color'];
			}
			
			
			if($ok){

				$hash=password_hash($password,PASSWORD_DEFAULT);

				$db=mysqli_connect('localhost','root','','php');
				$sql=sprintf("INSERT INTO users (name ,password,gender,color) values (
				'%s','%s','%s','%s'
				)",mysqli_real_escape_string($db,$name),
					mysqli_real_escape_string($db,$hash),
					mysqli_real_escape_string($db,$gender),
					mysqli_real_escape_string($db,$color));
				mysqli_query($db,$sql);
				mysqli_close($db);

				echo "
					<script type=\"text/javascript\">
					window.alert('added');
					</script>
					";	
				
				
			}
		}

	 ?>
	<form method="post" action="">
		<div class="container">
			<div class="row">
				<h1 style="text-align: center">Login</h1>
				<div style="width: 30%; margin: 25px auto;">
					<div class="form-group">
							<input class="form-control" type="text" name="name" value="<?php 
							echo htmlspecialchars($name);
							?>"placeholder="Username"><br>
					</div>
					<div class="form-group"> 
						<input class="form-control" type="password" name="password" 
						 placeholder="Password" ><br>
					</div>
					<div class="form-group">
						<input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">
					</div>
				</div>
			</div>
		</div>
		Gender:
				<input type="radio" name="gender" value="f"<?php 
					if($gender ==='f'){
						echo ' checked';
					}
				?>>female
				<input type="radio" name="gender" value="m"<?php 
					if($gender ==='m'){
						echo ' checked';
					}
				?>>male<br>
		Favorite color:
				<select name="color">
					<option value="">Please select</option>
					<option value="#f00"<?php 
					if($color === '#f00'){
						echo 'selected';
					}
					?>>Red</option>
					<option value="#0f0"<?php 
					if($color === '#0f0'){
						echo 'selected';
					}
					?>>Green</option>
					<option value="#00f"<?php 
					if($color === '#00f'){
						echo 'selected';
					}
					?>>Blue</option>
					
				</select><br>
		



				<input  type="submit" name="submit" value="Submit">
	</form>

</body>
</html>