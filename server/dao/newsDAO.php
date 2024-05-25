<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: newsDAO.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 15, 2023
 * Date Modified: Nov 19, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of newsDAO: function for news model.
 * 
 */
require_once('abstractDAO.php');
require_once('../model/news.php');

class NewsDAO extends abstractDAO {

    public function getAllNews() {
        $newsData = array();

        if (!$this->mysqli->connect_errno) {
            $query = "SELECT * FROM news order by newsdate desc";
            $result = $this->mysqli->query($query);

            while ($row = $result->fetch_assoc()) {
                $newsItem = new News(
                    $row['id'],
                    $row['title'],
                    $row['imageUrl'],
                    $row['content'],
                    $row['newsdate']
                );

                $newsData[] = $newsItem;
            }
        }

        return $newsData;
    }
} 
?>
