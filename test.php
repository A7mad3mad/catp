<?php
$serv='localhost';
$userna='root';
$pas='';
$database='catp';
$fullname=$_GET['fullname'];
$uname=$_GET['uname'];
$email=$_GET['email'];
$pass=$_GET['pass'];
$conn =  new mysqli($serv,$userna,  $pas, $database);
$sqlreq= "CREATE TABLE if NOT EXISTS login(id int not null AUTO_INCREMENT UNIQUE,fullname varchar(120),usern varchar(100),emails varchar(50),passw varchar(30)); ";
$conn->query($sqlreq);
$sqlreq1="INSERT into login VALUES(null,'$fullname','$uname','$email','$pass');";
$conn->query($sqlreq1);

echo($uname);

$sqlreq2="CREATE TABLE IF NOT EXISTS table_of_$uname( id int not null AUTO_INCREMENT UNIQUE , task VARCHAR(255) );";
$conn->query($sqlreq2);
$conn->close();


// $sql = "SELECT * FROM LOGIN";

// // Execute SQL query
//
// }




if ($conn):
    echo '<br>'."hello ahmad ";
endif;


?>