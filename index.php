
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD: CReate, Update, Delete PHP MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <form method="post">
            <div class="input-group">
                <label>Name</label>
                <input type="text" name="name" value="">
            </div>
            <div class="input-group">
                <label>Address</label>
                <input type="text" name="address" value="">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="save" >Save</button>
            </div>
        </form>
        
        <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "dbPratham";
        $conn = mysqli_connect($servername,$username,$password, $database);
        
        // initialize variables
        $name = "";
        $address = "";
        $id = 0;
        $update = false;

        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];

            $query = "INSERT INTO info (name, address) VALUES ('$name', '$address');";
            mysqli_query($conn,$query);
            $_SESSION['message'] = "Address saved";
            header('location: output.php');
            
        }
        ?>
        
        



    </body>
</html>