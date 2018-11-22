<?php
    session_start();
    if(!isset($_SESSION["established"]))
    {
        if(session_destroy())
        {
            header("location: login.php");
        }
    }else if(!$_SESSION["established"])
    {
        if(session_destroy())
        {
            header("location: login.php");
        }
    }
?>