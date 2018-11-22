<?php

    include "../../simple_login/php/session-ctl.php";

    define("TEST_ON", "test on");
    define("TEST_OFF", "test off");

    $html = file_get_contents("../html/main-page.html");

    $test_state = TEST_OFF;

    if(isset($_POST["test"]))
    {  
        if($_POST["test"] == TEST_ON)
        {
            $test_state = TEST_OFF;
        }else{
            $test_state = TEST_ON;
        }
    }

    if(isset($_POST["another"]))
    {  
        header("location: second-page.php");
    }

    $html = str_replace("{{test state}}", $test_state, $html);

    echo $html;
?>