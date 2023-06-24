<?php

$students = json_decode(file_get_contents('data.json'), true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center my-5">All Students</h1>
            <a class="btn btn-primary my-5" href="./pages/create.php">Add New Student</a>

            <?php require_once 'inc/messages.php' ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($students as $key =>  $student) :
                    ?>
                        <tr>
                            <th><?= $key + 1 ?></th>
                            <td><?= $student['name'] ?></td>
                            <td><?= $student['email'] ?></td>
                            <td><?= $student['phone'] ?></td>
                            <td>
                                <a class="btn btn-secondary" href="./pages/edit.php?id=<?= $key ?>">Edit</a>
                                <a class="btn btn-danger" href="./logic/destroy.php?id=<?= $key ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>