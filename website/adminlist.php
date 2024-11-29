<?php
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
    <h1>List of Employees</h1>
    <br>
    <div class="admincontent">
    <div class="table">
    <table class="tablelist" id="myTable">
        <thead>
            <tr>
                <th>Admin ID</th>
                <th>Username</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "dbcon.php";

            $sql = "CALL allEmployees();";
            $result = mysqli_query($conn, $sql); 

            if(!$result) {
                die("invalid query: " . $conn->error);
            }

            while($row = $result->fetch_assoc()){
                echo
                "<tr>
                    <td>" . $row["admin_id"] . "</td>
                    <td>" . $row["UPPER(username)"] . "</td>
                    <td>" . $row["UPPER(role)"] . "</td>
                    <td>
                        <a href='update' class='update'>  Update  </a>
                        <a href='delete' class='delete'>  Delete  </a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <script src="lib/jquery/jquery-3.7.1.min.js"></script>
    <script src="lib/datatables/datatables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    </div>
    <div class="panel">
        <h3>Profile</h3>
    </div>
    </div>
</body>
</html>