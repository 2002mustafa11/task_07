<?php

require_once '../inc/functions.php';

if(session_status() == PHP_SESSION_NONE) session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];
    $jsonDataPath = '../data.json';


    // (TASK) first check this id already existed in our json data

    $students = json_decode(file_get_contents($jsonDataPath), true);

    unset($students[$id]);

    $students = array_values($students);

    file_put_contents($jsonDataPath, json_encode($students));

    $_SESSION['success'] = 'Student Deleted Successfully!';

    redirect('../index.php');
} 