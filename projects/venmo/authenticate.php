<?php 
	session_start();

	// require authentication
    if (empty($_SESSION["id"]))
    {
        header('Location: index.php');
    };
?>