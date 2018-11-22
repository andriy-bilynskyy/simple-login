<?php
    
    define("PASS_MIN_LEN", 6);

    function set_password($password)
    {
        $result = False;
        if(strlen($password) >= PASS_MIN_LEN)
        {
            $ini_array = parse_ini_file("../login.ini");
            $pass_file = fopen($ini_array[password_file], "w") or die("Unable to create password file!");
            fwrite($pass_file, $password);
            fclose($pass_file);
            $result = True;
        }
        return $result;
    }

    function get_password()
    {
        $ini_array = parse_ini_file("../login.ini");
        $password = $ini_array[password_default];
        if(!is_file($ini_array[password_file]))
        {
            set_password($password);
        }else{
            $pass_file = fopen($ini_array[password_file], "r") or die("Unable to open password file!");
            $password = fread($pass_file, filesize($ini_array[password_file]));
            fclose($pass_file);
        }
        return $password;
    }

?>