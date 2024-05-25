<!-- 
    Author: Jessica Gunawan Student number 040861167
    Course: CST8285  
    Lab Section: 331
    Assesment: Assignment2
    File Name: waitlist.php
    Professor: Malek Al-Kouzi
    Date Created: Nov 17, 2023
    Date Modified: Nov 22, 2023
    Due Date: Nov 26, 2023
    Version: 1.0
    Description: A waitlist page-->
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
        <h1>Waitlist</h1>
        <div class="waitlist-container">

            <fieldset class="waitlist-preferences">
                <legend><b>Waitlist Preferences</b></legend>
                <div class="waitlist-location-input">
                    <label for="waitlist-location"><b>Set your waitlist location</b></label>
                    <?php
                    require_once('../dao/waitlistPreferenceDAO.php');

                    $waitlistPreferenceDAO = new WaitlistPreferenceDAO();
                    $preferences = $waitlistPreferenceDAO->getwaitlistPreferenceByUserId();

                    if ($preferences) {
                        foreach ($preferences as $preference) {
                            echo "<label for='waitlist-location'>{$preference->getLocationName()}</label>";
                            session_start();
                            $_SESSION["provider_id"] = $preference->getLocationId();
                        }
                    } else {
                        echo "<p>No location preferences found.</p>";
                    }
                    ?>

                    <button type='button' class='edit-button' onclick='showLocationDialog()'>Update</button>
                </div>

            </fieldset>

            <fieldset>
                <legend><b>Your Waitlist Status</b></legend>
                <div class="add-button-container">
                <button type='button' class='add-button' onclick='showProviderDialog()'>Add</button> </div>
                <label for="providerFilter">Filter by Provider Name:</label>
                <input type="text" id="providerFilter" oninput="filterTable()">
                <table>
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Provider</th>
                            <th>Estimated Wait Time</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        require_once('../dao/userWaitlistDAO.php');
                        require_once('../dao/providerDAO.php');
                        $userWaitlistDAO = new UserWaitlistDAO();
                        $providerDAO = new ProviderDAO();
                        $userWaitlistData = $userWaitlistDAO->getUserWaitlistByUserId();
                        if ($userWaitlistData) {
                            $rowCount = 0;
                            foreach ($userWaitlistData as $item) {
                                echo "<tr id='row{$rowCount}'>";
                                echo "<td>{$item->getPosition()}</td>";
                                $providerName = $providerDAO->getProviderNameById($item->getProviderId());
                                echo "<td>{$providerName}</td>";
                                echo "<td>{$item->getEstimateWaitTime()} Days</td>";
                                echo "<td>{$item->getStatus()}</td>";
                                echo "<td><button type='button' class='delete-button' data-user-waitlist-id='{$item->getId()}' onclick='deleteUserWaitlist(this)'>Delete</button></td>";
                                echo "</tr>";
                                $rowCount++;
                            }
                        } else {
                            echo "<p>No waitlist preferences found.</p>";
                        }
                        ?>
                    </tbody>

                </table>
            </fieldset>

            <div id="location-dialog">
                <h2>Select a location</h2>
                <ul id="location-list">
                    <?php
                    session_start();
                    require_once('../dao/locationDAO.php');
                    $locationDAO = new LocationDAO();
                    $userid = $_SESSION["user_id"];
                    $locations = $locationDAO->getAllLocationsForUserSelection();
                    echo "<select id='locationSelect'>";
                    foreach ($locations as $location) {
                        echo "<option value='{$location->getId()}'>{$location->getLocationName()}</option>";
                    }
                    echo "</select>";
                    echo "</ul>";
                    echo "<button type='button' class='update-button' onclick='updateUserLocation($userid)'>Update</button> ";
                    echo "<button type='button' onclick='closeLocationDialog()'>Cancel</button>";
                    ?>

            </div>
            <div id="provider-dialog">
                <h2>Select a Provider</h2>
                <ul id="provider-list">
                    <?php
                    session_start();
                    require_once('../dao/providerDAO.php');
                    $providerDAO = new ProviderDAO();
                    $userId =  $_SESSION["user_id"];
                    $providerId = $_SESSION["provider_id"];
                    $providers = $providerDAO->getAllProviderNameByLocationId($providerId);
                    echo "<select id='providerSelect'>";
                    foreach ($providers as $provider) {
                        echo "<option value='{$provider->getId()}'>{$provider->getProviderName()}</option>";
                    }
                    echo "</select>";
                    echo "</ul>";
                    echo "<button type='button' class='add-button' onclick='addUserWaitlist($userid)'>Add</button> ";
                    echo "<button type='button' onclick='closeProviderDialog()'>Cancel</button>";
                    ?>

            </div>

            <fieldset class="recent-activity">
                <legend><b>Recent Activity</b></legend>
                <ul>
                    <?php
                    require_once('../dao/notificationDAO.php');
                    $notificationDAO = new NotificationDAO();
                    $notificationData = $notificationDAO->getNotificationsByAction('WaitList');

                    foreach ($notificationData as $notification) {
                        echo "<li class='recent-notification-item'>- {$notification->getMessage()}</li>";
                    }
                    ?>
                </ul>
            </fieldset>


        </div>

    </main>
</body>

</html>