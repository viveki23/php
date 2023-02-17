<?php 
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','logdb');

//TRY TO CONNECT DATABASE
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

//check connect
if($conn === false){
    die("ERROR:Not connected".mysqli_connect_error());
}