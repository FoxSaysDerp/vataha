<?php
session_start();

require_once "config.php";

$error=$_FILES['f_file']['error'];
switch ($error)
{
	case 4:
	echo 'Nie wybrałeś zdjęcia';
	break;
	case 2:
	echo 'Zdjęcie jest zbyt duże. '. $_FILES['f_file']['size'];
		break;
  case 0:
  		move_uploaded_file($_FILES['f_file']['tmp_name'], './files/'.$_FILES['f_file']['name']);
  		$sql = "insert into files_info (name, type, size, description, username) values (?, ?, ?, ?, ?)";

			if($stmt = mysqli_prepare($link, $sql)){
					mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_type, $param_size, $param_description, $param_username);

					$param_name = $_FILES['f_file']['name'];
					$param_type = $_FILES['f_file']['type'];
					$param_size = $_FILES['f_file']['size'];
					$param_description = $_POST['f_info'];
					$param_username = $_SESSION["username"];

					mysqli_stmt_execute($stmt);
					echo "<h1><center>Zdjęcie zostało dodane</center></h1>";
					mysqli_stmt_close($stmt);
			}

			mysqli_close($link);

}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Vataha | Logowanie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="assets/styles.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="wrapper">
	<div class="row">
		<a href="welcome.php" type="submit" class="btn btn-primary">Wróć</a>
	</div>
</div>
</body>
</html>