<?php
define('DB_SERVER', '10.254.94.2');
define('DB_USERNAME', 's211525');
define('DB_PASSWORD', 'ijZxK5eZ');
define('DB_NAME', 's211525');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("Brak połączenia" . mysqli_connect_error());
}
?>
