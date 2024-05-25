<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: update_user_waitlist_preference.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 16, 2023
 * Date Modified: Nov 20, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of update_user_waitlist_preference: update user in waitlist preference
 * 
 */
require_once('waitlistPreferenceDAO.php');


if(isset($_GET['locationId']) && is_numeric($_GET['locationId'])) {
    $waitlistPreferenceDAO = new WaitlistPreferenceDAO();
    $locationId = $_GET['locationId'];
    $userId = $_GET['userId'];
    $success = $waitlistPreferenceDAO->updateWaitlistPreference($locationId,$userId);

    if ($success) {
        header('Location: ../pages/waitlist.php');
    } else {
        header('Location: ../pages/waitlist.php');
    }
} else {
    header('Location: ../pages/waitlist.php');
}
?>
