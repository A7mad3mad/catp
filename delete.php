<?php
$serv='localhost';
$userna='root';
$pas='';
$database='catp';
$con= new mysqli($serv,$userna,  $pas, $database);


if (isset($_GET['delete'])):
    $username=$_GET['username'];

    $id_del=$_GET['id_del'];
$sql="DELETE FROM table_of_$username WHERE id=$id_del ";
// $result = $con->query($sql);

    if ($con->query($sql) === TRUE) {
        echo ('Record deleted successfully'.'<br>');
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
    <input type="text" name='id_del' placeholder='put id task to delete'>
    <input type="submit" value="delete" name='delete'>
    
</form>