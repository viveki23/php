<?php 
//initialize the session
session_start();
//redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location:login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>welcome</title>

		<style>
            
		.login-form {
			width: 300px;
			margin: 0 auto;
			font-family: Tahoma, Geneva, sans-serif;
		}
		.login-form h1 {
			text-align: center;
			color: #4d4d4d;
			font-size: 24px;
			padding: 20px 0 20px 0;
		}
		.login-form input[type="password"],
		.login-form input[type="text"] {
			width: 100%;
			padding: 15px;
			border: 1px solid #dddddd;
			margin-bottom: 15px;
			box-sizing:border-box;
		}
		.login-form input[type="submit"] {
			width: 100%;
			padding: 15px;
			background-color: #535b63;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
		}
        .btn{
            width: 100%;
			padding: 15px;
			background-color: #535b63;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
        }
		</style>

	</head>
	<body>
		<div class="login-form">

			<h1>Welcome (-.-)</h1>
        <h2>
            <?php 
                 echo htmlspecialchars($_SESSION['username']);
            ?>
        </h2>
			
            <a class="btn" href="logout.php">Back to login </a>
          	
		</div>
	</body>
</html>