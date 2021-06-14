<?php
$error=$_FILES[f_file][error];
switch ($error)
{
	case 4: //File was not selected.
	echo 'Nie wybrałeś zdjęcia';
	break;
	case 2: //The uploaded file exceeds the MAX_FILE_SIZE
	echo 'Zdjęcie jest zbyt duże. '. $_FILES[f_file][size];
		break;
  case 0: //File was uploaded without error
  		echo 'Zdjęcie zostało dodane.';
  		move_uploaded_file($_FILES[f_file][tmp_name], './files/'.$_FILES[f_file][name]);
      include_once "../db_connection.php";
      $c= new PDO($db_pg, $user, $password);
  		$s = "insert into files_info values (:name, :type, :size, :description)";
  		$r=$c->prepare("$s");
  		$r->bindParam(':name', $_FILES[f_file][name]);
  		$r->bindParam(':type', $_FILES[f_file][type]);
  		$r->bindParam(':size', $_FILES[f_file][size]);
  		$r->bindParam(':description', $_POST[f_info]);
  		$r->execute();
  		$c = null;
}
?>

<br>
<a href="index.php">Wróć</a>
