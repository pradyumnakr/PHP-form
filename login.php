<?php
  session_start();

$message = '';

if (isset($_POST['name']) && isset($_POST['password'])) {
    $db = mysqli_connect('localhost', 'root', '', 'php');
    $sql = sprintf("SELECT * FROM users WHERE name='%s'",
        mysqli_real_escape_string($db, $_POST['name'])
    );
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $hash = $row['password'];
        $isAdmin = $row['isAdmin'];

        if (password_verify($_POST['password'], $hash)) {
            $message = 'Login successful.';

            $_SESSION['user'] = $row['name'];
            $_SESSION['isAdmin'] = $isAdmin;

        } else {
            $message = 'Login failed.';
        }
    } else {
        $message = 'Login failed.';
    }
    mysqli_close($db);
}


?><!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php
readfile('navigation.tmpl.html');

echo "<p>$message</p>";
?>
<form method="post" action="">
        <div class="container">
            <div class="row">
                <h1 style="text-align: center">Login</h1>
                <div style="width: 30%; margin: 25px auto;">
                    <div class="form-group">
                            <input class="form-control" type="text" name="name" 
                            placeholder="Username"><br>
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
</form>

</body>
</html>