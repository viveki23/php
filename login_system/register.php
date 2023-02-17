<?php 
#include config file
require_once 'config.php';

//define variable and initialize with empty values
$username = $password = $confirm_password ="";
$username_err = $password_err = $confirm_password_err = "";

//processing form,when data submitted.
if($_SERVER["REQUEST_METHOD"] == "POST" ){

    //Valid username
    if(empty(trim($_POST["username"]))){
        $username_err = "please enter a username";
    }else{
        //prepare select statement
        $sql = "SELECT id FROM log WHERE username = ?";

        if($stmt = mysqli_prepare($conn,$sql)) {
        //Bind variable to the prepare statement as parameter
        mysqli_stmt_bind_param($stmt,"s",$param_username);

        //set parameter
        $param_username = trim($_POST["username"]);

        //attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){

            //store result
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
                $username_err = "User exists";
            }else{
                $username = trim($_POST["username"]);
            }
        }else{
            echo "Try again";
        }
    }
    //close statement
    mysqli_stmt_close($stmt);
    }
    //valid password
    if(empty(trim($_POST['password']))){
        $password_err = "please enter a password";

    }elseif(strlen(trim($_POST['password']))<6)
        {
            $password = trim($_POST['password']);
        }
        //valid confirm password
        if(empty(trim($_POST['confirm_password']))){
            $confirm_password_err = 'please confirm password';
        }else{
            $confirm_password = trim($_POST['confirm_password']);
            if($password != $confirm_password){
                $confirm_password_err = 'password not match';

            } 
        }
        //checxk error before insert database
        if(empty($username_err) && empty ($password_err) && empty($confirm_password_err)){

            //prepare an insert statement
            $sql = "INSERT INTO log (username,password) VALUES (?,?)";
            if($stmt = mysqli_prepare($conn,$sql)){

                //bind variable to the prepare statement as parameter
                mysqli_stmt_bind_param($stmt, "ss",$param_username,$param_password);

                //set parameter
                $param_username = $username;
                $param_password = password_hash($password,PASSWORD_DEFAULT);

                //attempt to execute the parepared statement
                if(mysqli_stmt_execute($stmt)){

                    //redirect to login page
                    header("location:login.php");
                }else{
                    echo "something went wrong ,please try again";
                }
            }
             //close statement
        mysqli_stmt_close($stmt);
        }
        //close stament
        mysqli_close($conn);
       
    }

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>

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
			<h1>Register Form</h1>
			
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              
				<input type="text" value="<?php echo $username; ?>" name="username" aria-label="username" placeholder="Username" required>
               <span <?php echo $username_err; ?>  ></span>
               <div <?php echo (!empty($username_err)); ?>  ></div>

                <input type="password" value="<?php echo $password; ?>" name="password" aria-label="password" placeholder="Password" required>
                <span <?php echo $password_err; ?>  ></span>
                <div <?php echo (!empty($password_err)); ?>  ></div>

				<input type="password" value="<?php echo $password; ?>" name="confirm_password" aria-label="password" placeholder="Confirm-Password" required>
                <span <?php echo $confirm_password_err; ?>  ></span>
                <div <?php echo (!empty($confirm_password_err)); ?>  ></div>

				<input type="submit" name="submit" aria-label="submit">
			</form>
            <br>
            <p>Sign in here <a class="btn" href="login.php">Login Here </a></p>
           
		</div>

       
	</body>
</html>