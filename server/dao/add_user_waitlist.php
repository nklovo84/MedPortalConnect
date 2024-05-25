<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: add_user_waitlist.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 19, 2023
 * Date Modified: Nov 19, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of add_user_waitlist: add user to waitlist 
 * 
 */
session_start();
require_once('userWaitlistDAO.php');

if (isset($_GET['providerId']) && is_numeric($_GET['providerId'])) {
    $userWaitlistDAO = new UserWaitlistDAO();
    $providerId = $_GET['providerId'];
    $userId = $_GET['userId'];
    $success = $userWaitlistDAO->addeUserWaitlist($providerId, $userId);

    if ($success) {
        header('Location: ../pages/waitlist.php');
    } else {
        header('Location: ../pages/waitlist.php');
    }
} else {
    header('Location: ../pages/waitlist.php');
}
?>
