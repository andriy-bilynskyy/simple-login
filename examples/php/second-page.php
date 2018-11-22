<?php

    include "../../simple_login/php/session-ctl.php";

    $html = file_get_contents("../html/second-page.html");

    if(isset($_POST["back"]))
    {  
        header("location: main-page.php");
    }

    echo $html;
?>