<!-- 
    Author: Jessica Gunawan Student number 040861167
    Course: CST8285  
    Lab Section: 331
    Assesment: Assignment2
    File Name: notification.php
    Professor: Malek Al-Kouzi
    Date Created: Nov 17, 2023
    Date Modified: Nov 22, 2023
    Due Date: Nov 26, 2023
    Version: 1.0
    Description: A notification page-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jessica Gunawan">
    <title>MedPortal Connect</title>
    <link rel="stylesheet" href="/css/style.css">

    <script src="/scripts/script.js" defer></script>
</head>

<body>
    <header>
        <div class="top-bar">
            <div onclick="redirectToNotificationPageForPHP()" class="icon"><img src="/images/notification.png" alt="Notifications Icon"></div>
            <div onclick="redirectToUserProfilePageForPHP()" class="icon"><img src="/images/user.png" alt="Profile Icon"></div>
        </div>
    </header>

    <aside>
        <div class="sidebar">
            <div class="logo"><img src="/images/logo.png" alt="Health Portal Logo"></div>
            <nav>
                <ul>
                    <li><a href="../../pages/index.html">Home</a></li>
                    <li><a href="news.php">News Feed</a></li>
                    <li><a href="waitlist.php">Waitlist</a></li>
                    <li> <a href="../logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </aside>

    <main>
        <h1>Notification</h1>
        <div class="notification-container">

            <?php
            require_once('../dao/NotificationDAO.php');
            $notificationDAO = new NotificationDAO();
            $notifications = $notificationDAO->getNotifications();
            if (!empty($notifications)) {
                foreach ($notifications as $notification) {
                    echo '<div class="notification">';
                    echo '<img class="notification-icon" src="/images/notification_icon/' . $notification->getIconUrl() . '" alt="Notification Icon">';
                    echo '<div class="notification-content">';
                    echo '' . $notification->getMessage() . '<br>';
                    echo '<span class="notification-date">' . $notification->getNotificationDate() . '</span><br>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No notifications available.</p>';
            }
            ?>
        </div>
    </main>
</body>

</html>