
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Enzee Login</title>
    <link rel="stylesheet" href="lib/css/style.css">
</head>
<body>
    <div class="form-container">
    <form class="" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
    <h3>Login</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'. $error .'</span>';
            };
        };
        ?>
        <input type="text" name="email" id="email" required placeholder="Email">
        <input type="password" name="password" id="password" required placeholder="Password">
        <br><a href="forgotpassword" class="forgetpassword">Forget Password?</a>
        <input type="submit" value="Login" name="login" class="button">
        <p>Don't have an account? <a href="registration.php">Sign Up</a></p>
    </form>
    <img src="lib/css/logo.jpg" alt="">
    </div>
    
    <?php
require "dbcon.php";

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "CALL customerlogin('$email','$password')";
    $login = mysqli_query($conn, $query);        
        if(mysqli_num_rows($login) > 0){
            header("location.index.php");
        }else{
            $error[] = 'Wrong Email or Password';
        }
    }
?>

</body>
</html>