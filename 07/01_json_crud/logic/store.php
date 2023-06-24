<?php

require_once '../inc/functions.php';

if(session_status() == PHP_SESSION_NONE) session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];
    $jsonDataPath = '../data.json'; 

    foreach($_POST as $key => $value) $$key = sanitizeInput($value);

    if(empty($name)) $errors[] = 'Name Filed Is Required!';
    if(minVal($name, 3) || maxVal($name, 10)) $errors[] = 'Student Name Should Be Between 3 and 10 Characters';

    if(empty($email)) $errors[] = 'Email Filed Is Required!';
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please Enter A Valid Email';

    if(empty($phone)) $errors[] = 'Phone Filed Is Required!';

    if(empty($errors)) {

        $students = json_decode(file_get_contents($jsonDataPath), true);

        $newStudent = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ];

        $students[] = $newStudent;

        file_put_contents($jsonDataPath, json_encode($students));
        $_SESSION['success'] = 'Student Added Successfully!';

        redirect('../index.php');

    } else {

        $_SESSION['errors'] = $errors;

        redirect('../pages/create.php');
    }

}