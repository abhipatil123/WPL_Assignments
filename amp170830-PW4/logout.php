<?php
    session_start();
    echo "GoodBye " . $_SESSION["username"] . "<br/>";
    session_destroy();
?>