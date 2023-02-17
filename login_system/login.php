<?php 
    //database file include config.php
    require_once 'config.php';

    //define variable and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

        //processing data when submitted
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {

            //check username is empty
            if(empty(trim($_POST["username"]))) 
            {
              $username_err = 'please enter username';
            }
              else
                {
                 $username = trim($_POST["username"]);
                }
                    //check if password is empty
                    if(empty(trim($_POST['password'])))
                        {
                            $password_err ='please enter password';
                        }
                         else
                    {
                        $password = trim($_POST['password']);

                        //valid credentials
                        if(empty($username_err) && empty($password_err))
                        {

                            //prepare a select statement
                            $sql = "SELECT username, password FROM log WHERE username = ?";

                            if($stmt = mysqli_prepare($conn,$sql))
                            {
                                //bind variable to the prepare statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $param_username);

                                //set parameters
                                $param_username = $username;
                                //attempt to execute the prepare statement
                                if(mysqli_stmt_execute($stmt))
                                {
                                    //store result
                                    mysqli_stmt_store_result($stmt);
                                    //check if username exists,if yes then verfy password
                                    if(mysqli_stmt_num_rows($stmt) == 1)
                                    {
                                        //bind result variable
                                        mysqli_stmt_bind_result($stmt,$username,$hashed_password);
                                        if(mysqli_stmt_fetch($stmt))
                                        {
                                            if (password_verify($password,$hashed_password))
                                                {
                                                    //if password ok ,start session and save username
                                                    session_start();
                                                    $_SESSION['username'] = $username;
                                                    header("location:welcome.php");
                                                }
                                                else
                                                    {
                                                        //display error message,if incorrect password
                                                        $password_err = 'Not Valid Password';
                                                    }
                                        }
                                    }
                                     else
                                        {
                                            //display error if username not existing
                                            $username_err = 'Not a valid username found';
                                        }
                                }
                                else
                                    {
                                     echo "something went wrong,please try again.";
                                    }
                            }
                             //close statement
                              mysqli_stmt_close($stmt);
                        }
                          //close connection
                        mysqli_close($conn);
                    }
                }

?>





<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login </title>

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
			padding: 10px;
			background-color:green;
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
			<h1>Login for Welcome </h1>
			
			
			<form action="" method="post">
               
				<input type="text" name="username" aria-label="username" placeholder="Username" required>
               
				<input type="password" name="password" aria-label="password" placeholder="Password" required>
				<input type="submit" name="submit" aria-label="submit">
			</form>
            <br>
            <p>Don't have an account?<a class="btn" href="register.php">Register here </a></p>
          
		</div>
	</body>
</html>