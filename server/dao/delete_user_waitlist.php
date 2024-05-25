<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: delete_user_waitlist.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 15, 2023
 * Date Modified: Nov 19, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of delete_user_waitlist: delete user from waitlist 
 * 
 */
session_start();
require_once('userWaitlistDAO.php');

if (isset($_GET['userWaitlistId']) && is_numeric($_GET['userWaitlistId'])) {
    $userWaitlistDAO = new UserWaitlistDAO();
    $userWaitlistId = $_GET['userWaitlistId'];
    $success = $userWaitlistDAO->deleteUserWaitlist($userWaitlistId);

    if ($success) {
        header('Location: ../pages/waitlist.php');
    } else {
        header('Location: ../pages/waitlist.php');
    }
} else {
    header('Location: ../pages/waitlist.php');
}
?>