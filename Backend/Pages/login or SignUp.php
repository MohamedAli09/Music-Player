<?php


// Include the User class and database configuration
include('../classes/User.php');
include('../config/database.php');




if ($_POST && isset($_POST['register'])) {

    // Create a new instance of the User class
    $user = new User($pdo);

    $username = trim($_POST['txt']);
    $email = trim($_POST['email']);
    $password = ($_POST['pswd']);


    // Call the register() method to add the user to the database
    $resuilt = $user->register($username, $email, $password);

    if ($resuilt === true) {
        $success = "Registration successful!";

        // Display a success message using JavaScript
        
    
    echo '<script>alert("' . $success . '"); location.href="http://localhost/Backend/Pages/login or SignUp.php";</script>';
        


     } else {
        // If there were errors, display them to the user
        $errors = $resuilt;
    }
}


if($_POST && isset($_POST['login']) &&  isset($_POST['email']) &&  isset($_POST['pswd']))
{
       // Get the email and password from the form

    $email = ($_POST['email']);
    $password = ($_POST['pswd']);

        // Create a new User object
    $user = new User($pdo);

    // Try to log the user in
    $resuilt = $user->login($email ,$password );

    if($resuilt===true)
    {
        header('Location: http://localhost/Frontend/main.html ');
        exit;
    }
    else
    {

        echo '<script>alert("' . "email or password is invalid" . '"); location.href="http://localhost/Backend/Pages/login or SignUp.php";</script>';
         exit;
    }


    
}   







?>

                    <?php 
                    if (isset($errors)) 
                    {
                        echo '<script>alert("' . "Username or email address already in use" . '"); location.href="http://localhost/Backend/Pages/login or SignUp.php";</script>';

                    }

                  
                  ?>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./register_style.css">
    <title>Beatflow-login or SignUp</title>
</head>
<body>
<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
                    <button type="submit" name="register" class="btn btn-primary mt-2">Register</button>
				</form>
			</div>

			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
                    <button type="submit" name="login" class="btn btn-primary mt-2">Login</button>

				</form>
			</div>
	</div>

  
</body>
</html>

         
      

