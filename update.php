<?php
$serv='localhost';
$userna='root';
$pas='';
$database='catp';
$con= new mysqli($serv,$userna,  $pas, $database);

if (isset($_GET['update'])):
    $username=$_GET['username'];
    $new_value=$_GET['new_value'];
    $id_up=$_GET['id_up'];
$sql = "UPDATE table_of_$username SET task = '$new_value' WHERE id = $id_up";

// $result = $con->query($sql);

    if ($con->query($sql) === TRUE) {
        echo ('Record updated successfully'.'<br>');
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







?>
<form  method="get">
    <input type="text" name= 'username' placeholder='put your username'>
    <br>
    <input type="text" name='id_up' placeholder='put id task to update'>
<br>
    <input type="text" name='new_value' placeholder='put new value to update'>    
    
    <input type="submit" value="update" name='update'>
    
</form>