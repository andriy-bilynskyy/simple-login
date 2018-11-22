<?php
    
    include("session.php");

    $ini_array = parse_ini_file("../login.ini");
    if(is_file("../".$ini_array[user_inifile]))
    {
        $user_ini_array = parse_ini_file("../".$ini_array[user_inifile]);
        $ini_array = array_merge($ini_array, $user_ini_array);
    }

    $html = file_get_contents("../html/welcome.html");

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

    if(isset($_SESSION["last_uri"]))
    {
        $main_page = $_SESSION["last_uri"];
    }else{
        $main_page = "../html/def-main.html";
        if(is_file("../".$ini_array[external_main]))
        {
            $main_page = "../".$ini_array[external_main];
        }
    }
    $html = str_replace("{{main page}}", $main_page, $html);

    if(isset($_POST["logout"]))
    {
        if(session_destroy())
        {
            header("location: login.php");
        }
    }

    if(isset($_POST["chpassword"]))
    {
        header("location: change-password.php");
    }

    echo $html;
?>