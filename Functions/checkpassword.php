<?php

session_start();
ini_set('session.gc_maxlifetime', 3600);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);

if($_POST['password'] == "tubbies")
{
    $_SESSION['CanAccess'] = "Yes";
}
else
{
    $_SESSION['CanAccess'] = "No";
}

header('Location: /' . $_SERVER['HTTP_REFERER']);
die();
?>