<!-- 
    Author: Jessica Gunawan Student number 040861167
    Course: CST8285  
    Lab Section: 331
    Assesment: Assignment2
    File Name: logout.php
    Professor: Malek Al-Kouzi
    Date Created: Nov 17, 2023
    Date Modified: Nov 22, 2023
    Due Date: Nov 26, 2023
    Version: 1.0
    Description: control logout page-->
<?php
session_start();
$_SESSION = array();

session_destroy();

header("Location: ../../../pages/login.html");
exit();
?>