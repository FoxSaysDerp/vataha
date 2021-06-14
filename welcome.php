<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Vataha</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="assets/styles2.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="wrapper">
		<img src="assets/img/vataha.png" class="img-fluid" alt="Vataha logo" />
	</div>
	<div class="wrapper">
		<div class="row">
			<div class="col-sm-12 my-auto">
				<h1>Cześć, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Co u Ciebie?</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 my-auto">
				<a href="reset-password.php" type="submit" class="btn btn-primary">Zresetuj swoje hasło</a>
				<a href="logout.php" class="btn btn-danger">Wyloguj się</a>
			</div>
		</div>
	<div class="wrapper">
		<div class="row">
			<div class="formContent">
				<form method="post" action="files_save.php" enctype="multipart/form-data">
					<input type=hidden name="max_file_size" value="131072" />Wybierz zdjęcie: <input type=file name=f_file />
					<p><textarea name=f_info rows=3 cols=40 maxlength=255 placeholder="Dodaj komentarz do zdjęcia (maksymalne 255 znaków)"></textarea></p>
						<div class="wrapper">
							<input type="submit" class="btn btn-primary" value="Wstaw zdjęcie">
						</div>
				</form>
			</div>
		</div>
	</div>

<?php
$row="";
require_once "config.php";
$query = "SELECT * from files_info ORDER by post_id DESC";
$result = mysqli_query($link, $query);
while($row = mysqli_fetch_array($result)) {
    echo "<h1 class='name'>".$row['username']."</h1>";
    $id = $row['post_id'];
    $name = $row['name'];
    $images = glob("files/$name");
    foreach($images as $image) {
    echo '<img src="'.$image.'" />'; }
    echo '<div id="imgDesc">'.$row['description'].'</div>';

  }
mysqli_close($link);
?>



<footer></footer>
</body>
</html>
