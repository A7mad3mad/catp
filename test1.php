<?php 
$email=$_POST['email'];
$passw=$_POST['pass'];
$username=$_POST['username'];
$serv='localhost';
$userna='root';
$pas='';
$database='catp';
$con= new mysqli($serv,$userna,  $pas, $database);
$sql="SELECT * FROM `login` WHERE emails='$email' and passw='$passw' ; ";

$result = $con->query($sql);


if ($con->query($sql)->num_rows >0):
    echo ("<h1>hello $email</h1>" );
    echo '--------------------hello your login ses ------------------------';
    $sql="SELECT * from table_of_$username ";
    $con->query($sql);
    $result = $con->query($sql);

?>
<br>
<a href="delete.php" target="_blank" rel="noopener noreferrer">DELETE TASK</a>
<br>
<br>
<a href="create.php" target="_blank" rel="noopener noreferrer">CREATE A NEW TASK</a>
<br>
<br>
<a href="update.php" target="_blank" rel="noopener noreferrer">UPDATE TASK</a>
<?php
echo("<br>");
    if ($result->num_rows > 0) :
        while($row = $result->fetch_assoc()) {
            echo "<br>"."ID: " . $row["id"].  " // task: " . $row["task"]. "<br>";
        }
else :
        echo "you havn't any tasks yet ";
    endif;

else :
        echo '<br>'.'-----------------sorry you must sin up----------------------';
endif;





