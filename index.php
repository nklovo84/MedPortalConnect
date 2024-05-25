<!-- 
    Author: Jessica Gunawan Student number 040861167
    Course: CST8285  
    Lab Section: 331
    Assesment: Assignment2
    File Name: index.php
    Professor: Malek Al-Kouzi
    Date Created: Nov 17, 2023
    Date Modified: Nov 22, 2023
    Due Date: Nov 26, 2023
    Version: 1.0
    Description: control index page-->
<?php
session_start();

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
    header("Location: pages/index.html");
    exit();
} else {
    header("Location: pages/login.html");
    exit();
}
?>

