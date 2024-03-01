<?php
$serv='localhost';
$userna='root';
$pas='';
$database='catp';
$con= new mysqli($serv,$userna,  $pas, $database);

if (isset($_GET['create'])):
    $username=$_GET['username'];

    $ntask=$_GET['ntask'];
$sql="INSERT INTO table_of_$username VALUES(NULL,'$ntask') ;";

    if ($con->query($sql) === TRUE) {
        echo ('Record added successfully'.'<br>');
        } else {
            echo "Error deleting record: " . $con->error;
        }
endif;

$sql="SELECT * FROM table_of_$username ";
$result=$con->query($sql);

if ($result->num_rows > 0) :
    while($row = $result->fetch_assoc()) :
        echo "ID: " . $row["id"]. " - Name task: " . $row["task"] ."<br>";
    endwhile;
else :
    echo "0 results";
endif;

// Close connection
$con->close();












?>
<form  method="get">
    <input type="text" name= 'username' placeholder='put your username'>
    <br>
    <input type="text" name='ntask' placeholder='put NEW task to create'>
    <input type="submit" value="create" name='create'>
    
</form>