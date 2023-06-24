<?php
session_start();

if ($_SERVER['REQUEST_METHOD']=='GET'&& isset($_GET['id'])) {
$conn=mysqli_connect('localhost','root','','mydata');
$id=$_GET['id'];
$sql="DELETE FROM `tasks` WHERE  `id`=$id";

mysqli_query($conn,$sql);

if (mysqli_affected_rows($conn)==1) {
    $_SESSION['success']='success';
}else {
    $_SESSION['error']='not found';
}
mysqli_close($conn);
header("location:../index.php");
}