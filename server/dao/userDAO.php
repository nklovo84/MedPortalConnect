<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: userDAO.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 16, 2023
 * Date Modified: Nov 20, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of userDAO: function for user model
 * 
 */
session_start();
require_once('abstractDAO.php');
require_once('../model/user.php');
error_reporting(0);


class userDAO extends abstractDAO
{

    function __construct()
    {
        try {
            parent::__construct();
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }
    public function getUsers()
    {
        $result = $this->mysqli->query('SELECT * FROM users');
        $users = array();

        if ($result->num_rows >= 1) {
            while ($row = $result->fetch_assoc()) {
                $users = new User($row['id'], $row['username'], $row['password'], $row['firstname'], $row['lastname'], $row['dateofbirth'], $row['email'], $row['phonenumber'], $row['gender'], $row['healthcardno'], $row['versioncode'], $row['cardexpirydate']);
                $users[] = $users;
            }
            $result->free();
            return $users;
        }
        $result->free();
        return false;
    }

    public function getUser()
    {
        $id =  $_SESSION["user_id"];
        $query = 'SELECT * FROM users WHERE id = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $temp = $result->fetch_assoc();
            $user = new User($temp['id'], $temp['username'], $temp['password'], $temp['firstname'], $temp['lastname'], $temp['dateofbirth'], $temp['email'], $temp['phonenumber'], $temp['gender'], $temp['healthcardno'], $temp['versioncode'], $temp['cardexpirydate']);
            $result->free();
            return $user;
        }
        $result->free();
        return false;
    }

    public function addUser($user)
    {
        if (!$this->mysqli->connect_errno) {
            $query = 'INSERT INTO users VALUES (?,?,?)';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param(
                'iss',
                $user->getFirstName(),
                $user->getLastName()
            );
            $stmt->execute();
            if ($stmt->error) {
                return $stmt->error;
            } else {
                return $user->getFirstName() . ' ' . $user->getLastName() . ' added successfully, coffee!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
    public function updateUserProfile($user)
    {
        if (!$this->mysqli->connect_errno) {
            $query = 'UPDATE users SET firstname=?, lastname=?, dateofbirth=?, email=?, phonenumber=?, gender=?, healthcardno=?, versioncode=?, cardexpirydate=? WHERE id=?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param(
                'sssssssssi',
                $user->getFirstName(),
                $user->getLastName(),
                $user->getDateOfBirth(),
                $user->getEmail(),
                $user->getPhonenumber(),
                $user->getGender(),
                $user->getHealthcardno(),
                $user->getVersioncode(),
                $user->getCardExpiryDate(),
                $user->getUserId()
            );

            $stmt->execute();
            if ($stmt->error) {
                return $stmt->error;
            } else {
                return true;
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
}
?>