<?php
    
    include "password.php";

    session_start();
    if(!isset($_SESSION["established"]))
    {
        $_SESSION["established"] = False;
    }else if($_SESSION["established"])
    {
        header("location: welcome.php");
    }

    $ini_array = parse_ini_file("../login.ini");
    if(is_file("../".$ini_array[user_inifile]))
    {
        $user_ini_array = parse_ini_file("../".$ini_array[user_inifile]);
        $ini_array = array_merge($ini_array, $user_ini_array);
    }

    $html = file_get_contents("../html/login.html");

    $icon = "../html/images/icon.ico";
    if(is_file("../".$ini_array[icon_file]))
    {
        $icon = "../".$ini_array[icon_file];
    }
    $html = str_replace("{{icon}}", $icon, $html);

    $textcss = "../html/styles/main.css";
    if(is_file("../".$ini_array[stlyle_file]))
    {
        $textcss = "../".$ini_array[stlyle_file];
    }
    $html = str_replace("{{textcss}}", $textcss, $html);


    if(isset($_POST["login"]))
    {  
        if($_POST["password"] == get_password())
        {
            $_SESSION["established"] = True;
            if($_SESSION["established"])
            {
                header("location: welcome.php");
            }
        }else{
            $error = "wrong password.";
        }
    }else{
        $error = "";
    }
    $html = str_replace("{{error}}", $error, $html);

    echo $html;
?>