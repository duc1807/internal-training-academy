<?php
session_start();
if (session_destroy()) // destroy all sessions
{
    // relative path is accepted by `header` method
    header("location: ./../index.php"); // redirect to index page
}
?>