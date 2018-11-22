<?php
    
    include "password.php";
    include("session.php");

    $ini_array = parse_ini_file("../login.ini");
    if(is_file("../".$ini_array[user_inifile]))
    {
        $user_ini_array = parse_ini_file("../".$ini_array[user_inifile]);
        $ini_array = array_merge($ini_array, $user_ini_array);
    }

    $html = file_get_contents("../html/change-password.html");

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


    if(isset($_POST["change"]))
    {  
        if($_POST["old-password"] == get_password())
        {
            if(strlen($_POST["new-password"]) >= PASS_MIN_LEN)
            {
                if($_POST["new-password"] == $_POST["conf-password"])
                {
                    set_password($_POST["new-password"]);
                    $error = "password changed!";
                }else{
                    $error = "new password and confirmed password mismatch.";
                }
            }else{
                $error = "password length less than ".PASS_MIN_LEN." is not acceptable.";
            }
        }else{
            $error = "wrong old password.";
        }
    }else{
        $error = "";
    }


    if(isset($_POST["back"]))
    {  
        header("location: welcome.php");
    }

    $html = str_replace("{{error}}", $error, $html);

    echo $html;
?>