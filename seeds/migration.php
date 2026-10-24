<?php

$conn = mysqli_connect("localhost", "root", "");

$db = mysqli_query($conn, "SHOW DATABASES LIKE 'market'");
$count_dbs = mysqli_num_rows($db);

if($count_dbs == 0){
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `market`");

mysqli_select_db($conn, "market");


mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS users(
user_id int PRIMARY KEY AUTO_INCREMENT,
user_fname varchar(50),
user_lname varchar(50),
user_email varchar(100),
user_password varchar(200),
user_role varchar(50) DEFAULT 'user'
)
");

mysqli_query($conn, "
INSERT INTO users(user_fname, user_lname, user_email, user_password, user_role)
VALUES('Moiz', 'Hussain', 'moiz@gmail.com', sha1('111'), 'admin')
");
}

else{
    echo "Migration Already Execute";
}

?>