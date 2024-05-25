<!-- 
    Author: Jessica Gunawan Student number 040861167
    Course: CST8285  
    Lab Section: 331
    Assesment: Assignment2
    File Name: userprofile.php
    Professor: Malek Al-Kouzi
    Date Created: Nov 17, 2023
    Date Modified: Nov 22, 2023
    Due Date: Nov 26, 2023
    Version: 1.0
    Description: A userprofile page-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jessica Gunawan">
    <title>MedPortal connect</title>
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
        <div id="user-profile-container">
            <h1>User Profile</h1>
            <?php
            require_once('../dao/userDAO.php');

            $userDAO = new userDAO();


            $user = $userDAO->getUser();


            if ($user) {
                echo '<form action="#" method="post">';

                echo '<fieldset>';
                echo '<legend>Personal Information</legend>';
                echo '<label for="username">Username:</label>';
                echo '<input id="username" name="username" value="' . $user->getUsername() . '" ><br>';

                echo '<label for="firstname">First Name:</label>';
                echo '<input type="text" id="firstname" name="firstname" value="' . $user->getFirstName() . '"><br>';

                echo '<label for="lastname">Last Name:</label>';
                echo '<input type="text" id="lastname" name="lastname" value="' . $user->getLastName() . '"><br>';

                echo '<label for="dateofbirth">Date of Birth:</label>';
                echo '<input type="date" id="dateofbirth" name="dateofbirth" value="' . $user->getDateOfBirth() . '"><br>';

                echo '<label for="email">Email:</label>';
                echo '<input type="email" id="email" name="email" value="' . $user->getEmail() . '"><br>';

                echo '<label for="phonenumber">Phone Number:</label>';
                echo '<input type="tel" id="phonenumber" name="phonenumber" value="' . $user->getPhonenumber() . '"><br>';

                echo '<label for="gender">Gender:</label>';
                echo '<select id="gender" name="gender">';
                echo '<option value="male" ' . (($user->getGender() === 'male') ? 'selected' : '') . '>Male</option>';
                echo '<option value="female" ' . (($user->getGender() === 'female') ? 'selected' : '') . '>Female</option>';
                echo '<option value="other" ' . (($user->getGender() === 'other') ? 'selected' : '') . '>Other</option>';
                echo '</select><br>';
                echo '</fieldset>';

                echo '<fieldset>';
                echo '<legend>Health Card Information</legend>';

                echo '<label for="healthcardno">Health Card Number:</label>';
                echo '<input type="text" id="healthcardno" name="healthcardno" value="' . $user->getHealthcardno() . '"><br>';

                echo '<label for="versioncode">Version Code:</label>';
                echo '<input type="text" id="versioncode" name="versioncode" value="' . $user->getVersioncode() . '"><br>';

                echo '<label for="cardexpirydate">Card Expiry Date:</label>';
                echo '<input type="date" id="cardexpirydate" name="cardexpirydate" value="' . $user->getCardExpiryDate() . '"><br>';

                echo '</fieldset>';



                echo '</form>';
            } else {
                echo '<p>User not found.</p>';
            }
            ?>
        </div>
    </main>
</body>

</html>