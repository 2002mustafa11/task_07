<?php
session_start();
$conn=mysqli_connect('localhost','root','','mydata');
$sql='SELECT * FROM `tasks`';
$result=mysqli_query($conn,$sql);
;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">

<div class="row">
        
            <h1 class="text-center my-5"></h1>
            <div class="col-8 mx-auto" >

            <form action="handler/store_task.php" method="POST" class="form border p-1 my-5">
                
                <?php
                if (isset($_SESSION['success'])) {
                 echo "<div class='alert alert-success' role='alert''>".$_SESSION['success']."</div>";
                    unset($_SESSION['success']);
                }elseif (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger' role='alert''>".$_SESSION['error']."</div>";
                    unset($_SESSION['error']);
                }
                
                ?>
                <input type="text" name="titl" class="form-control" >
                
              <input class="btn btn-primary " type="submit" value="create">
            </form>
            </div>
           <div class="col-20">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >task</th>
                        <th >action</th>
                        
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php while ($row=mysqli_fetch_assoc($result)) {
                    
                        
                    ?>
                        <tr>
                            
                            <td><?=$row['id']?></td>
                            <td><?=$row['titl']?></td>
                            <td class='col-2'>
                            <a class="btn btn-secondary" href="update.php?id=<?=$row['id']?>">Edit</a>
                                <a class="btn btn-danger" href="handler/delete_task.php?id=<?=$row['id']?>">Delete</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>