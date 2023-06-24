<?php 
 
 session_start();

if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['id'])) {
    if (strlen($_POST['titl'])<4) {
        $_SESSION['error']='not found';
        header("location:../index.php");
        exit;
    }
$conn=mysqli_connect('localhost','root','','mydata');
$id=$_POST['id'];
$titl=$_POST['titl'];
$sql="UPDATE tasks SET  titl='$titl' WHERE id='$id'";
mysqli_query($conn,$sql);

if (mysqli_affected_rows($conn)==1) {
    $_SESSION['success']='success';
}else {
    $_SESSION['error']='not found';
}
mysqli_close($conn);
header("location:../index.php");
}