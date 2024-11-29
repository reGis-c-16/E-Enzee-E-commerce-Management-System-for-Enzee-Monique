<?php
require "dbcon.php";
include"header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="lib/datatables/datatables.css">
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="lib/css/style.css">
</head>
<body>
    <div class="main">
    <h1>List of Customers</h1>
    <br>
    <div class="admincontent">
    <div class="table">
    <table class="tablelist" id="myTable">
        <thead>
            <tr>
                <th> </th>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Account Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "dbcon.php";

            $sql = "CALL allCustomers();";
            $result = mysqli_query($conn, $sql); 

            if(!$result) {
                die("invalid query: " . $conn->error);
            }

            while($row = $result->fetch_assoc()){
                echo
                "<tr>
                    <td><img src='img/customer/" . $row["customer_image"] . "'></td>
                    <td>" . $row["customer_id"] . "</td>
                    <td>" . $row["UPPER(fname)"] . "</td>
                    <td>" . $row["UPPER(lname)"] . "</td>
                    <td>" . $row["account_status"] . "</td>
                    <td><button value=".$row["customer_id"]." id='tempselect' class='update'>Select</button></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>        
    </div>
    <script src="lib/jquery/jquery-3.7.1.min.js"></script>
    <script src="lib/datatables/datatables.js"></script>
   
    <div class="panel">
        <h3>Profile</h3>
        <form class="" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
            <input type="text" name="customer_id" id="customer_id">
        <?php
         
        $id = "";
            echo"id number '$id'";
           /* echo"<img src='img/customer/" . $profile["customer_image"] . "'>
            <input type='text' name='lname' id='lname' value=>
            <input type='text' name='fname' id='fname' >
            <input type='text' name='email' id='email' >
            <input type='text' name='phone' id='phone' >
            <input type='password' name='password' id='password' >
            <input type='submit' value='Update' name='submit' class='button'>";
            */
        
        ?>
        
    </form>
    </div>
    <?php
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

    </div>
    </div>
    </div>
    

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        $(document).on('click','#tempselect', function () {
            let testid = $(this).val();

            const id = {
                customer_id: testid
            };
            $('#customer_id').val(id);
            console.log(id);
        });

        

    </script>
    
</body>
</html>