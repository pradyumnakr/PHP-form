<!DOCTYPE html>
<html>
<head>
	<title>Forms</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php
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
			if(!isset($_POST['comments']) || $_POST['comments'] === ''){
				$ok=false;
			}else{
				$comments=$_POST['comments'];
			}
			if(!isset($_POST['gender']) || $_POST['gender'] === ''){
				$ok=false;
			}else{
				$gender=$_POST['gender'];
			}
			if(!isset($_POST['tc']) || $_POST['tc'] === ''){
				$ok=false;
			}else{
				$tc=$_POST['tc'];
			}
			if(!isset($_POST['color']) || $_POST['color'] === ''){
				$ok=false;
			}else{
				$color=$_POST['color'];
			}
			if(!isset($_POST['languages']) || !is_array($_POST['languages']) 
				 || count($_POST['languages']) === 0){
				$ok=false;
			}else{
				$languages=$_POST['languages'];
			}
			if($ok){

			printf('Username: %s
				<br>Password: %s
				<br>Gender:   %s
				<br>Color:    %s
				<br>Language(s):%s
				<br>Comments:%s
				<br>TandC:%s ',
				htmlspecialchars($name),
				htmlspecialchars($password),
				htmlspecialchars($gender),
				htmlspecialchars($color),
				htmlspecialchars( implode(' ',$languages)),
				htmlspecialchars($comments),
				htmlspecialchars($tc));
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
						<input class="form-control" type="password" name="password" value="<?php 
						echo htmlspecialchars($password);
						?>" placeholder="Password" ><br>
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
		Languages Spoken:
				<select name="languages[]" multiple size="3">
					<option value="kan"<?php 
					if(in_array('kan' , $languages)){
						echo 'selected';
					}
					?>>Kannada</option>
					<option value="eng"<?php 
					if(in_array('eng' , $languages)){
						echo 'selected';
					}
					?>>English</option>
					<option value="hin"<?php 
					if(in_array('hin' , $languages)){
						echo 'selected';
					}
					?>>Hindi</option><br>
				</select><br>



		Comments:
				<textarea name="comments">
					<?php echo htmlspecialchars($comments); 
					?>
				</textarea><br>
				<input type="checkbox" name="tc" value="ok" <?php  
				if($tc ===  'ok'){
					echo ' checked';
				}
				?>>I agree to terms and policies<br>
				<input  type="submit" name="submit" value="Submit">
	</form>

</body>
</html>