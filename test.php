<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";




    if (isset($_POST['insert'])) {
 
        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $age = $_POST["age"];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "INSERT INTO table_test (id, fname, lname, age) VALUES ('".$id."', '".$fname."', '".$lname."', '".$age."')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    if (isset($_POST['update'])) {
 
        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $age = $_POST["age"];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "UPDATE `table_test` SET `fname`='".$fname."',`lname`='".$lname."',`age`='".$age."' WHERE `id`='".$id."'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    if (isset($_POST['delete'])) {
 
        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $age = $_POST["age"];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "DELETE FROM `table_test` WHERE `id`='".$id."'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    if(isset($_POST['search']))
    {
        $id = $_POST["id"];
        
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        

        $sql = "SELECT `fname`, `lname`, `age` FROM `table_test` WHERE `id`='".$id."'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            if(mysqli_num_rows($result))
            {
                while($row = mysqli_fetch_array($result))
                {
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $age = $row['age'];
                }
            }else{
                echo 'No Data For This Id';
            }
        }else{
            echo 'Result Error';
        }
        
        $conn->close();
    }







?>


    
<!DOCTYPE Html>
<html>
    <head>
        <title>PHP INSERT UPDATE DELETE SEARCH</title>
    </head>
    <body>
        <form action="test.php" method="post">
            <input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>"><br><br>
            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>"><br><br>
            <input type="number" name="age" placeholder="Age" value="<?php echo $age;?>"><br><br>
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
            </div>
        </form>
    </body>
</html>
    