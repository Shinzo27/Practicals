<html>
    <head>
        <title>CRUD: CReate, Update, Delete PHP MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>


        <?php 
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $update = true;
                $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

                if (count($record) == 1 ) {
                    $n = mysqli_fetch_array($record);
                    $name = $n['name'];
                    $address = $n['address'];
                }
            }
        ?>

        <?php
            session_start();
            if (isset($_SESSION['message'])): ?>
            <div class="msg">
                    <?php 
                            echo $_SESSION['message']; 
                            unset($_SESSION['message']);
                    ?>
            </div>
            <?php endif ?>

        <?php 
        
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "dbPratham";
        $conn = mysqli_connect($servername,$username,$password, $database);
        
        $results = mysqli_query($conn, "SELECT * FROM info"); ?>

        <table>
                <thead>
                        <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th colspan="2">Action</th>
                        </tr>
                </thead>

                <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td>
                                    <a href="output.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                                </td>
                                <td>
                                        <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                                </td>
                        </tr>
                <?php } ?>
        </table>                 
                
                <form method="get">
                    <div class="input-group">
                        <label>Name</label>
                        <input type="text" name="name" value="">
                    </div>
                    <div class="input-group">
                        <label>Address</label>
                        <input type="text" name="address" value="">
                    </div>
                    <div class="input-group">
                        <button class="btn" type="submit" name="update" >Update</button>
                    </div>
                </form>
        
            //newly added field
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            //modified form fields
            <input type="text" name="name" value="<?php echo $name; ?>">
            <input type="text" name="address" value="<?php echo $address; ?>">
          
    </body>
</html>