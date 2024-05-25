<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: loginDAO.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 15, 2023
 * Date Modified: Nov 19, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of loginDAO: control a login page 
 * 
 */
session_start();

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
    header("Location: ../../pages/index.html");
    exit();
}

require_once('abstractDAO.php');

class loginDAO extends abstractDAO
{

    public function loginUser($username, $password)
    {
        try {
            $stmt = $this->mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($password == $row["password"]) {
                    session_start();
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["authenticated"] = true;
                    header("Location: ../../pages/index.html");
                    exit();
                } else {
                    echo "Invalid password";
                }
            } else {
                echo "User not found";
            }

            $stmt->close();
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $loginDAO = new LoginDAO();
    $loginDAO->loginUser($username, $password);
}
?>