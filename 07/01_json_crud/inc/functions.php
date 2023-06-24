<?php

function sanitizeInput($value)
{
    return htmlentities(htmlspecialchars(stripslashes(trim($value))));
}

function minVal($value, $length)
{
    return strlen($value) < $length ? true : false;
}

function maxVal($value, $length)
{
    return strlen($value) > $length ? true : false;
}

function redirect(string $path)
{
    header("Location: $path");
    exit;
}

function dd($data)
{
    echo "<pre>";
        print_r($data);
    echo "</pre>";
    exit;
}