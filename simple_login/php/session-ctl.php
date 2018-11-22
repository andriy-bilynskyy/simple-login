<?php

    $login_path = dirname(__FILE__);
    $root_path = realpath($_SERVER["DOCUMENT_ROOT"]);
    $login_page = str_replace($root_path, "", $login_path)."/login.php";
    session_start();
    if(!isset($_SESSION["established"]))
    {
        if(session_destroy())
        {
            echo '<script type="text/javascript">window.top.location = "'.$login_page.'"</script>';
            exit();
        }
    }else if(!$_SESSION["established"])
    {
        if(session_destroy())
        {
            echo '<script type="text/javascript">window.top.location = "'.$login_page.'"</script>';
            exit();
        }
    }else{
        $_SESSION["last_uri"] = $_SERVER["REQUEST_URI"];
    }
?>