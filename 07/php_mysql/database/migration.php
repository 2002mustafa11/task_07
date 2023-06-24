<?php

$con=mysqli_connect('localhost','root','');

$sql='CREATE DATABASE IF NOT EXISTS mydata';

mysqli_query($con,$sql);


$conn=mysqli_connect('localhost','root','','mydata');

$sql='CREATE TABLE IF NOT EXISTS tasks(
id INT PRIMARY KEY AUTO_INCREMENT,
titl VARCHAR(200) NOT NULL
)';

mysqli_query($conn,$sql);

mysqli_close($conn);