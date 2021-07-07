<?php
session_start();

function getUserData()
{
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $pass;
}

function verifyLogin()
{
    $emailDb = "user@gmail.com";
    $passDb = "user2021";
    $passDbHash = password_hash($passDb, PASSWORD_DEFAULT);
    if (password_verify($_SESSION["password"], $passDbHash) && $_SESSION["email"] == $emailDb) {
        header("Location: ./panel.php");
    } else {
        $_SESSION["loginError"] = "Wrong email o password";
        header("Location: ./index.php");
    }
}

getUserData();
verifyLogin();
