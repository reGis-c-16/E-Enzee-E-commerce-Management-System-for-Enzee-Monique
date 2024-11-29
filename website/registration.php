
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Enzee registration</title>
    <link rel="stylesheet" href="lib/css/style.css">
</head>
<body>
    <div class="form-container">
    <img src="lib/css/logo.jpg" alt="">
    <form class="" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
        <h3>Register</h3>
        <input type="text" name="lname" id="lname" required placeholder="First Name">
        <input type="text" name="fname" id="fname" required placeholder="Last Name">
        <input type="text" name="email" id="email" required placeholder="Email">
        <input type="text" name="phone" id="phone" required placeholder="Phone Number">
        <input type="password" name="password" id="password" required placeholder="Password">
        <input type="password" name="confirmpassword" id="confirmpassword" required placeholder="Confirm Password">
        <input type="submit" value="Register" name="submit" class="button">
        <p>Already have and account? <a href="login.php">Login</a></p>
    </form>
    </div>
    <?php
require "dbcon.php";

if(isset($_POST["submit"])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "CALL registerCustomers('$fname','$lname','$email','$phone','$password')";    
    mysqli_query($conn, $query);
    echo
    "<script>
        alert('Successful Registration');
    </script>";
    }

?>

</body>
</html>