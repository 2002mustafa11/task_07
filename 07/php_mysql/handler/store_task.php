<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['titl'])) {
if (strlen($_POST['titl'])<4) {
    $_SESSION['error']='not found';
    header("location:../index.php");
    exit;
}
    $title= trim(htmlspecialchars(htmlentities($_POST['titl'])));

$conn=mysqli_connect('localhost','root','','mydata');


$sql="INSERT INTO `tasks`(`titl`) VALUES ('$title')";
mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn)==1) {
    $_SESSION['success']='success';
}

mysqli_close($conn);
header("location:../index.php");
}