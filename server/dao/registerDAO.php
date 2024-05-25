<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: registerDAO.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 15, 2023
 * Date Modified: Nov 19, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of registerDAO: function for a register page.
 * 
 */
require_once('abstractDAO.php');
require_once('../model/registerRequest.php');
require_once('notificationDAO.php');
class registerDAO extends abstractDAO
{

    public function registerUser($user)
    {

        if (!$this->mysqli->connect_errno) {
            $query = 'INSERT INTO users (username, password,firstname,lastname,dateofbirth,email,phonenumber,gender,healthcardno,versioncode,cardexpirydate) VALUES (?,?,?,?,?,?,?,?,?,?,?)';

            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param(
                'sssssssssss',
                $user->getUsername(),
                $user->getPassword(),
                $user->getFirstName(),
                $user->getLastName(),
                $user->getDateOfBirth(),
                $user->getEmail(),
                $user->getPhonenumber(),
                $user->getGender(),
                $user->getHealthcardno(),
                $user->getVersioncode(),
                $user->getCardExpiryDate(),
            );

            $stmt->execute();
            if ($stmt->error) {
                return $stmt->error;
            } else {
                $userId = $stmt->insert_id;
                $notificationDAO = new NotificationDAO();
                $notificationDAO->addNotificationDefault($userId);
                return $user->getUsername() . ' ' . $user->getFirstName() . ' ' . $user->getFirstName() . ' added successfully.';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dateofbirth = $_POST["dateofbirth"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $gender = $_POST["gender"];
    $healthcardno = $_POST["healthcardno"];
    $versioncode = $_POST["versioncode"];
    $cardexpirydate = $_POST["cardexpirydate"];

    $user = new registerRequest($username, $password, $firstname, $lastname, $dateofbirth, $email, $phonenumber, $gender, $healthcardno, $versioncode, $cardexpirydate);

    $registerDAO = new registerDAO();
    $result = $registerDAO->registerUser($user);
    header("Location: ../../pages/login.html");
    exit();
}
?>