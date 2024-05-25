<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: userWaitlistDAO.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 16, 2023
 * Date Modified: Nov 20, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of userWaitlistDAO: function for userWaitlist model
 * 
 */
session_start();
require_once('abstractDAO.php');
require_once('../model/userWaitlist.php');
class UserWaitlistDAO extends abstractDAO
{

    public function getUserWaitlistByUserId()
    {
        $userWaitlist = array();

        $userId =  $_SESSION["user_id"];
        if (!$this->mysqli->connect_errno) {
            $query = 'SELECT * FROM user_waitlist WHERE userid = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $userId);

            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $userWaitlistItem = new UserWaitlist(
                    $row['id'],
                    $row['providerid'],
                    $row['position'],
                    $row['status'],
                    $row['estimatewaittime'],
                    $row['userid']
                );
                $userWaitlist[] = $userWaitlistItem;
            }

            $stmt->close();
        }

        return $userWaitlist;
    }

    public function deleteUserWaitlist($userWaitlistId)
    {
        if (!$this->mysqli->connect_errno) {
            $query = 'DELETE FROM user_waitlist WHERE id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $userWaitlistId);
            $stmt->execute();
            if ($stmt->error) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }


    public function addeUserWaitlist($providerid, $userId)
    {
        if (!$this->mysqli->connect_errno) {
            $position = mt_rand(1, 100);
            $estimateWaitTime = mt_rand(1, 100);

            $query = 'INSERT INTO user_waitlist (providerid, userid, position, status, estimatewaittime) VALUES (?, ?, ' . $position . ',"Pending",' . $estimateWaitTime . ')';
            $stmt = $this->mysqli->prepare($query);

            $stmt->bind_param('ii', $providerid, $userId);
            $stmt->execute();
            if ($stmt->error) {
                return $stmt->error;
            } else {
                return 'added successfully, coffee!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
}
?>