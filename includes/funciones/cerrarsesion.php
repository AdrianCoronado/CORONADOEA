<?php
function cerrarsesion()
{
    session_start();
    $_SESSION = [];

    header('location:../../index.php');
}

cerrarsesion();
